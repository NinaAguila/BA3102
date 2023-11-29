Imports MySql.Data.MySqlClient

Public Class LoginForm
    Dim username As String
    Dim password As String
    Private Sub btnlogin_Click(sender As Object, e As EventArgs) Handles btnlogin.Click
        Try
            Using strcon As MySqlConnection = New MySqlConnection("server=localhost;user id=root;database=db_ba3102")
                strcon.Open()

                Dim found As Boolean = False

                Using cmd As MySqlCommand = New MySqlCommand("SELECT * FROM `tbl_useradmin` WHERE `Username`=@Username AND `Password`=@Password", strcon)
                    cmd.Parameters.AddWithValue("@Username", txtUser.Text)
                    cmd.Parameters.AddWithValue("@Password", txtPass.Text)

                    Using dr As MySqlDataReader = cmd.ExecuteReader
                        If dr.Read() Then
                            found = True
                            username = dr("Username").ToString()
                            password = dr("Password").ToString()
                        End If
                    End Using
                End Using

                If found Then
                    If Not (String.Equals(txtUser.Text, username, StringComparison.Ordinal) AndAlso
                            String.Equals(txtPass.Text, password, StringComparison.Ordinal)) Then
                        MsgBox("Wrong Username or Password!", vbExclamation, "Invalid Input")
                    Else
                        Me.Hide()
                        strcon.Close()
                        MainDashboard.Show()
                    End If
                    strcon.Close()
                Else
                    MsgBox("Please Enter Correct Username & Password!", vbExclamation, "Invalid Input")
                End If
            End Using
        Catch ex As Exception
            MsgBox(ex.Message)
            strcon.Close()
        End Try
        strcon.Close()
        txtPass.Clear()
        txtUser.Clear()
    End Sub

    Private Sub btnclose_Click(sender As Object, e As EventArgs) Handles btnclose.Click
        If MsgBox("Are you sure you want to exit?", vbInformation + vbYesNo, "LogiLibrary") = vbYes Then
            End
        Else
            Return
        End If
    End Sub
End Class