Imports AForge.Video
Imports AForge.Video.DirectShow
Imports AForge.Imaging
Imports System.Text.RegularExpressions
Imports System.Windows.Forms.VisualStyles.VisualStyleElement
Imports MySql.Data.MySqlClient
Imports System.Xml
Imports System.Reflection.Metadata
Imports System.IO
Imports Emgu.CV
Imports Emgu.CV.Ocl
Imports System.Drawing.Drawing2D

Public Class userform
    Dim Camera As VideoCaptureDevice
    Dim bmp As Bitmap
    Dim capturing As Boolean = False
    Dim con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")

    Private Sub userform_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        FormCenter.CenterForm(Me)
        FormDrag.EnableFormDragging(Me)

        Try
            Dim num As Integer = 0
            Using con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")
                con.Open()
                Dim query As String = "SELECT max(visitor_no) FROM visitor_infotbl"
                cmd = New MySqlCommand(query)
                cmd.Connection = con
                If (IsDBNull(cmd.ExecuteScalar)) Then
                    num = 1
                    UidTxtbx.Text = num.ToString
                Else
                    num = cmd.ExecuteScalar + 1
                    UidTxtbx.Text = num.ToString
                End If

            End Using
        Catch ex As Exception
            MessageBox.Show(ex.ToString)
        End Try
    End Sub

    Private Sub captured(ByVal sender As System.Object, ByVal eventargs As NewFrameEventArgs)
        bmp = DirectCast(eventargs.Frame.Clone(), Bitmap)
        visitor_pbox.Image = DirectCast(eventargs.Frame.Clone(), Bitmap)
    End Sub

    Private Sub startCam1_Click(sender As Object, e As EventArgs) Handles startCam1.Click
        Dim cameras As VideoCaptureDeviceForm = New VideoCaptureDeviceForm
        If cameras.ShowDialog = Windows.Forms.DialogResult.OK Then
            Camera = cameras.VideoDevice
            AddHandler Camera.NewFrame, New NewFrameEventHandler(AddressOf captured)
            Camera.Start()
            capturing = True
        End If
    End Sub

    Private Sub Take1_Click(sender As Object, e As EventArgs) Handles Take1.Click
        If capturing Then
            capturing = False
            Camera.SignalToStop()
            Camera.WaitForStop()
        End If
    End Sub

    Private Sub capturedID(ByVal sender As System.Object, ByVal eventargs As NewFrameEventArgs)
        bmp = DirectCast(eventargs.Frame.Clone(), Bitmap)
        visitorID_pbox.Image = DirectCast(eventargs.Frame.Clone(), Bitmap)
    End Sub
    Private Sub start2btn_Click(sender As Object, e As EventArgs) Handles start2btn.Click
        Dim cameras As VideoCaptureDeviceForm = New VideoCaptureDeviceForm
        If cameras.ShowDialog = Windows.Forms.DialogResult.OK Then
            Camera = cameras.VideoDevice
            AddHandler Camera.NewFrame, New NewFrameEventHandler(AddressOf capturedID)
            Camera.Start()
            capturing = True
        End If
    End Sub

    Private Sub take2_Click(sender As Object, e As EventArgs) Handles take2.Click
        If capturing Then
            capturing = False
            Camera.SignalToStop()
            Camera.WaitForStop()
        End If
    End Sub

    Private Sub submitbtn_Click(sender As Object, e As EventArgs) Handles submitbtn.Click
        Dim con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")
        con.Open()


        If fullnametxtbx.Text = "" OrElse
       addresstxtbx.Text = "" OrElse
       cnumbertxtbx.Text = "" OrElse
       visitor_pbox.Image Is Nothing OrElse
       visitorID_pbox.Image Is Nothing OrElse
       ComboBoxDept.Text = "" OrElse
       ComboBoxPurp.Text = "" Then
            MessageBox.Show("Please Input All Required Information", "Invalid Input", MessageBoxButtons.OK, MessageBoxIcon.Error)
            Return
        End If

        Dim purpose As String = ComboBoxPurp.Text
        Dim currentTime As DateTime = DateTime.Now
        Dim formattedTime As String = currentTime.ToString("hh:mm tt", System.Globalization.CultureInfo.InvariantCulture)

        If ComboBoxPurp.SelectedItem.ToString() = "Others" Then
            purpose = specifiedtxtbx.Text
        Else
            purpose = ComboBoxPurp.SelectedItem.ToString()
        End If

        Try
            Dim image1 As Image = visitor_pbox.Image
            Dim ms1 As New MemoryStream
            image1.Save(ms1, System.Drawing.Imaging.ImageFormat.Jpeg)
            Dim photo1 As Byte() = ms1.ToArray()

            Dim image2 As Image = visitorID_pbox.Image
            Dim ms2 As New MemoryStream
            image2.Save(ms2, System.Drawing.Imaging.ImageFormat.Jpeg)
            Dim photo2 As Byte() = ms2.ToArray()


            Dim insert As String = "INSERT INTO visitor_infotbl (`visitor_name`, `visitor_add`, `visitor_contact_no`, `visitor_photo`, `visitorID_photo`) VALUES (@Fname, @address, @contactNo, @photo, @photoID)"
            cmd = New MySqlCommand(insert, con)
            cmd.Parameters.AddWithValue("@Fname", fullnametxtbx.Text)
            cmd.Parameters.AddWithValue("@address", addresstxtbx.Text)
            cmd.Parameters.AddWithValue("@contactNo", cnumbertxtbx.Text)
            cmd.Parameters.Add("@photo", MySqlDbType.LongBlob).Value = photo1
            cmd.Parameters.Add("@photoID", MySqlDbType.LongBlob).Value = photo2
            cmd.ExecuteNonQuery()

            Dim insert2 As String = "INSERT INTO visiting_infotbl (`point_of_interest`, `purpose`, `time_of_visit`, `time_in`) VALUES (@POI, @purpose, @currentDate, @currentTime)"
            cmd = New MySqlCommand(insert2, con)
            cmd.Parameters.AddWithValue("@POI", ComboBoxDept.Text)
            cmd.Parameters.AddWithValue("@purpose", purpose)
            cmd.Parameters.AddWithValue("@currentDate", Date.Today)
            cmd.Parameters.AddWithValue("@currentTime", formattedTime)
            cmd.ExecuteNonQuery()

            MessageBox.Show("Successfully Added New Data" & vbCrLf & "Please wait for your visitor pass to print", "Created", MessageBoxButtons.OK, MessageBoxIcon.Information)
            Me.Hide()
            Menu.timeoutbtnPb.Enabled = True
            Menu.Show()

            Dim printDocument As New Printing.PrintDocument()
            AddHandler printDocument.PrintPage, AddressOf PrintDocument_PrintPage
            printDocument.Print()



            UidTxtbx.Clear()
            fullnametxtbx.Clear()
            addresstxtbx.Clear()
            cnumbertxtbx.Clear()
            specifiedtxtbx.Clear()
            visitor_pbox.Image = Nothing
            visitorID_pbox.Image = Nothing
            ComboBoxDept.Text = ""
            ComboBoxPurp.Text = ""

            Try
                Dim num As Integer = 0

                Dim query As String = "SELECT max(visitor_no) FROM visitor_infotbl"
                cmd = New MySqlCommand(query)
                cmd.Connection = con
                If (IsDBNull(cmd.ExecuteScalar)) Then
                    num = 1
                    UidTxtbx.Text = num.ToString
                Else
                    num = cmd.ExecuteScalar + 1
                    UidTxtbx.Text = num.ToString
                End If


            Catch ex As Exception
                MessageBox.Show(ex.ToString)
            End Try

        Catch ex As Exception
            MessageBox.Show(ex.ToString)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub PrintDocument_PrintPage(sender As Object, e As Printing.PrintPageEventArgs)

        Try
            Dim visitorNo As String = "Visitor Number: " & UidTxtbx.Text
            Dim currentDate As String = Date.Today.ToString("MM-dd-yyyy")
            Dim visitorName As String = "Visitor Name: " & fullnametxtbx.Text
            Dim pointOfInterest As String = "Point of Interest: " & ComboBoxDept.Text
            Dim purpose As String = ComboBoxPurp.Text
            If ComboBoxPurp.SelectedItem.ToString() = "Others" Then
                purpose = specifiedtxtbx.Text
            Else
                purpose = ComboBoxPurp.SelectedItem.ToString()
            End If


            Dim printFont As New Font("Arial", 14)
            Dim printBrush As New SolidBrush(Color.Black)


            Dim printArea As New RectangleF(100, 100, 400, 200)


            e.Graphics.DrawString("Batangas State University", printFont, printBrush, printArea.Left, printArea.Top)
            e.Graphics.DrawString("        Lipa Campus", printFont, printBrush, printArea.Left, printArea.Top + 40)
            e.Graphics.DrawString("**Please keep this for time-out and other purposes**", printFont, printBrush, printArea.Left, printArea.Top + 80)
            e.Graphics.DrawString(visitorNo, printFont, printBrush, printArea.Left, printArea.Top + 120)
            e.Graphics.DrawString(visitorName, printFont, printBrush, printArea.Left, printArea.Top + 160)
            e.Graphics.DrawString(pointOfInterest, printFont, printBrush, printArea.Left, printArea.Top + 200)
            e.Graphics.DrawString("Purpose: " & purpose, printFont, printBrush, printArea.Left, printArea.Top + 240)
            e.Graphics.DrawString("Date Of Visit: " & currentDate, printFont, printBrush, printArea.Left, printArea.Top + 280)
        Catch ex As Exception
            MessageBox.Show(ex.ToString)
        End Try
    End Sub
End Class