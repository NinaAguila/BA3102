
Imports ThoughtWorks.QRCode.Codec
Public Class VisitorRegistration
    Private Sub btnExit_Click(sender As Object, e As EventArgs) Handles btnExit.Click
        End
    End Sub

    Private Sub btnBack_Click(sender As Object, e As EventArgs) Handles btnBack.Click
        Me.Hide()
        MainDashboard.Show()
    End Sub

    Private Sub btnRegister_Click(sender As Object, e As EventArgs) Handles btnRegister.Click
        ' Validate input for each textbox
        If String.IsNullOrWhiteSpace(txtName.Text) OrElse
            String.IsNullOrWhiteSpace(txtAddress.Text) OrElse
            String.IsNullOrWhiteSpace(txtContactNo.Text) OrElse
            String.IsNullOrWhiteSpace(txtSchool.Text) Then
            MessageBox.Show("Please fill in all required fields.", "Incomplete Information", MessageBoxButtons.OK, MessageBoxIcon.Warning)
            Return
        End If

        Dim objqrcode As QRCodeEncoder = New QRCodeEncoder
        Dim img As Image
        Dim btm As Bitmap
        'Dim str As String
        'Str = txtName.Text + " " + txtAddress.Text + " " + txtContactNo.Text + " " + txtSchool.Text

        objqrcode.QRCodeScale = 5
        img = objqrcode.Encode(txtName.Text)
        Dim imagePath As String = "qrimage.jpg"
        btm = New Bitmap(img)
        btm.Save(imagePath)
        PictureBox1.ImageLocation = imagePath

        If PictureBox1.Image IsNot Nothing Then
            MessageBox.Show("Please Clear QR-code before clicking Register!", "Visitor Registration")
        Else
            Try
                ' Check if the visitor information already exists
                Dim query As String = "SELECT * FROM tbl_visitor WHERE VisitorName ='" & txtName.Text & "' AND VisitorAddress ='" & txtAddress.Text & "' AND VisitorContactNo ='" & txtContactNo.Text & "' AND VisitorSchool ='" & txtSchool.Text & "' AND VisitorQrCode ='" & imagePath & "'"

                ' Use the reloadtxt method to execute the query and fill the DataTable
                reloadtxt(query)

                If dt.Rows.Count > 0 Then
                    MessageBox.Show("Visitor information already exists!", "Visitor Registration", MessageBoxButtons.OK, MessageBoxIcon.Exclamation)
                    Reset()
                    PictureBox1.Image.Dispose()
                    PictureBox1.Image = Nothing
                Else
                    ' If not exists, insert the new visitor information
                    create("INSERT INTO tbl_visitor(VisitorName,VisitorAddress,VisitorContactNo,VisitorSchool,VisitorQrCode)VALUES('" & txtName.Text & "','" & txtAddress.Text & "','" & txtContactNo.Text & "','" & txtSchool.Text & "','" & imagePath & "')")
                    Reset()
                End If
            Catch ex As Exception
                MessageBox.Show(ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
            End Try
        End If
    End Sub

    Private Sub btnClearQR_Click(sender As Object, e As EventArgs) Handles btnClearQR.Click
        If PictureBox1.Image IsNot Nothing Then
            PictureBox1.Image.Dispose()
            PictureBox1.Image = Nothing
        Else
            MessageBox.Show("No QR-code to clear.", "Visitor Registration", MessageBoxButtons.OK, MessageBoxIcon.Information)
        End If
        Reset()
    End Sub

    Sub Reset()
        txtAddress.Text = ""
        txtContactNo.Text = ""
        txtName.Text = ""
        txtSchool.Text = ""
    End Sub
End Class