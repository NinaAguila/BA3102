Imports AForge
Imports AForge.Video
Imports AForge.Video.DirectShow
Imports ZXing
Public Class StudentVistorAccess

    Dim filterInfoCollection As FilterInfoCollection
    Dim captureDevice As VideoCaptureDevice

    Public Sub New()
        InitializeComponent()
    End Sub

    Private Sub btnBack_Click(sender As Object, e As EventArgs) Handles btnBack.Click
        Dim dialogResult2 As DialogResult = MessageBox.Show("Main Dashboard is for admin only! Do you want to login?", "Restricted", MessageBoxButtons.OKCancel, MessageBoxIcon.Exclamation)
        If dialogResult2 = DialogResult.OK Then
            Me.Hide()
            strcon.Close()
            LoginForm.Show()
        End If
    End Sub

    Private Sub StudentVistorAccess_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        filterInfoCollection = New FilterInfoCollection(FilterCategory.VideoInputDevice)
        For Each filterInfo As FilterInfo In filterInfoCollection
            cmb_device.Items.Add(filterInfo.Name)
        Next
        cmb_device.SelectedIndex = 0
    End Sub

    Private Sub CaptureDevice_NewFrame(sender As Object, eventArgs As NewFrameEventArgs)
        If btnTimeInOut.Enabled Then
            PictureBox1.Image = DirectCast(eventArgs.Frame.Clone(), Bitmap)
        End If
    End Sub

    Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
        lbl_time.Text = Date.Now.ToString("hh:mm:ss tt")
        lbl_date.Text = Date.Now.ToString("dd-MMMM-yyyy dddd")

    End Sub

    Private Sub StudentVistorAccess_FormClosing(sender As Object, e As FormClosingEventArgs) Handles MyBase.FormClosing
        If captureDevice IsNot Nothing AndAlso captureDevice.IsRunning Then
            captureDevice.Stop()
            txtDecodedQr.Clear()
        End If
    End Sub

    Private Sub Timer2_Tick(sender As Object, e As EventArgs) Handles Timer2.Tick
        If PictureBox1.Image IsNot Nothing Then
            Dim barcodeReader As New BarcodeReader()
            Dim result As Result = barcodeReader.Decode(DirectCast(PictureBox1.Image, Bitmap))
            If result IsNot Nothing Then
                txtDecodedQr.Text = result.ToString()
                Dim dialogResult As DialogResult = MessageBox.Show("Qr-Code Successfully Scanned!", "Qr Scan", MessageBoxButtons.OK)
                If dialogResult = DialogResult.OK Then
                    TimeInOut()
                    Reset()
                End If
                Reset()
            End If
        End If

    End Sub

    Public Sub TimeInOut()
        Try
            If txtDecodedQr.Text = "" Then
                MessageBox.Show("No decoded text!", "Warning!", MessageBoxButtons.OK, MessageBoxIcon.Exclamation)
            Else
                ' Check if the code exists in student table
                reloadtxt("SELECT * FROM tbl_student WHERE SrCode ='" & txtDecodedQr.Text & "'")

                If dt.Rows.Count > 0 Then
                    ' The code exists in the student table
                    ' Determine whether the code corresponds to a student or a visitor
                    Dim isStudent As Boolean = True

                    ' Check if the user has already Timed In/Out for today
                    reloadtxt("SELECT * FROM tbl_studentlogs WHERE SrCode ='" & txtDecodedQr.Text & "' AND LogDate ='" & lbl_date.Text & "' AND inStatus='TIME IN' AND outStatus='TIME OUT'")

                    If dt.Rows.Count > 0 Then
                        MessageBox.Show("You have already Timed In/Out for today!", "Qr Scan", MessageBoxButtons.OK, MessageBoxIcon.Information)
                    Else
                        ' Check if the user has already Timed In for today
                        reloadtxt("SELECT * FROM tbl_studentlogs WHERE SrCode ='" & txtDecodedQr.Text & "' AND LogDate ='" & lbl_date.Text & "' AND inStatus='TIME IN'")

                        If dt.Rows.Count > 0 Then
                            ' Update the existing record with Time Out
                            updateLogged("UPDATE tbl_studentlogs SET TimeOut='" & Date.Now.ToString("hh:mm:ss tt") & "', outStatus='TIME OUT' WHERE SrCode ='" & txtDecodedQr.Text & "' AND LogDate ='" & lbl_date.Text & "'")
                            MessageBox.Show("Successfully Timed Out!", "Qr Scan", MessageBoxButtons.OK, MessageBoxIcon.Information)

                        Else
                            ' Insert a new record with Time In
                            createLogged("INSERT INTO tbl_studentlogs(SrCode,LogDate,TimeIn,inStatus) VALUES('" & txtDecodedQr.Text & "','" & lbl_date.Text & "','" & Date.Now.ToString("hh:mm:ss tt") & "','TIME IN')")
                            MessageBox.Show("Successfully Timed In!", "Qr Scan", MessageBoxButtons.OK, MessageBoxIcon.Information)

                        End If
                    End If
                Else
                    ' The code does not exist in the student table, check in the visitor table
                    reloadtxt("SELECT * FROM tbl_visitor WHERE VisitorName ='" & txtDecodedQr.Text & "'")

                    If dt.Rows.Count > 0 Then
                        ' The code exists in the visitor table
                        ' Determine whether the code corresponds to a student or a visitor
                        Dim isStudent As Boolean = False

                        ' Check if the user has already Timed In/Out for today
                        reloadtxt("SELECT * FROM tbl_visitorlogs WHERE VisitorName ='" & txtDecodedQr.Text & "' AND LogDate ='" & lbl_date.Text & "' AND inStatus='TIME IN' AND outStatus='TIME OUT'")

                        If dt.Rows.Count > 0 Then
                            MessageBox.Show("You have already Timed In/Out for today!", "Qr Scan", MessageBoxButtons.OK, MessageBoxIcon.Information)
                        Else
                            ' Check if the user has already Timed In for today
                            reloadtxt("SELECT * FROM tbl_visitorlogs WHERE VisitorName ='" & txtDecodedQr.Text & "' AND LogDate ='" & lbl_date.Text & "' AND inStatus='TIME IN'")

                            If dt.Rows.Count > 0 Then
                                ' Update the existing record with Time Out
                                updateLogged("UPDATE tbl_visitorlogs SET TimeOut='" & Date.Now.ToString("hh:mm:ss tt") & "', outStatus='TIME OUT' WHERE VisitorName ='" & txtDecodedQr.Text & "' AND LogDate ='" & lbl_date.Text & "'")
                                MessageBox.Show("Successfully Timed Out!", "Qr Scan", MessageBoxButtons.OK, MessageBoxIcon.Information)

                            Else
                                ' Insert a new record with Time In
                                createLogged("INSERT INTO tbl_visitorlogs (VisitorName,LogDate,TimeIn,inStatus) VALUES('" & txtDecodedQr.Text & "','" & lbl_date.Text & "','" & Date.Now.ToString("hh:mm:ss tt") & "','TIME IN')")
                                MessageBox.Show("Successfully Timed In!", "Qr Scan", MessageBoxButtons.OK, MessageBoxIcon.Information)

                            End If
                        End If
                    Else
                        ' The code does not exist in the visitor table either
                        MessageBox.Show("QrCode is not valid", "Qr Not Found", MessageBoxButtons.OK, MessageBoxIcon.Exclamation)
                    End If
                End If
            End If
        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
    End Sub

    Private Sub btnTimeInOut_Click(sender As Object, e As EventArgs) Handles btnTimeInOut.Click
        Timer2.Stop()
        txtDecodedQr.Clear()
        If PictureBox1.Image IsNot Nothing Then
            PictureBox1.Image.Dispose()
            PictureBox1.Image = Nothing
        End If
        captureDevice = New VideoCaptureDevice(filterInfoCollection(cmb_device.SelectedIndex).MonikerString)
        AddHandler captureDevice.NewFrame, AddressOf CaptureDevice_NewFrame
        captureDevice.Start()
        Timer2.Start()
    End Sub

    Public Sub Reset()
        Timer2.Stop()
        captureDevice.Stop()
        txtDecodedQr.Clear()

        ' Dispose of the image (if it exists)
        If PictureBox1.Image IsNot Nothing Then
            PictureBox1.Image.Dispose()
            PictureBox1.Image = Nothing  ' Set to Nothing after disposing
        End If
    End Sub
End Class