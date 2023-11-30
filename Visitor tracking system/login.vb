Imports System.Drawing.Drawing2D
Imports MySql.Data.MySqlClient
Imports System.Text
Public Class login
    Private Sub login_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        FormCenter.CenterForm(Me)
        FormDrag.EnableFormDragging(Me)
    End Sub

    Private Sub loginBtnPb_Click(sender As Object, e As EventArgs) Handles loginBtnPb.Click
        If unametxtbx.Text = "" OrElse passtxtbx.Text = "" Then
            MessageBox.Show("Please Input All Required Information", "Invalid Input", MessageBoxButtons.OK, MessageBoxIcon.Error)
            Return
        End If

        Try
            Using con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")
                con.Open()
                Dim query As String = "SELECT tbempinfo.lastname, tbempinfo.firstname, account_tbl.empid, account_tbl.password FROM account_tbl INNER JOIN tbempinfo ON account_tbl.empid = tbempinfo.empid WHERE account_tbl.username = @username AND account_tbl.password = @password"
                Using cmd As New MySqlCommand(query, con)
                    cmd.Parameters.AddWithValue("@username", unametxtbx.Text)
                    cmd.Parameters.AddWithValue("@password", passtxtbx.Text)

                    Dim dr As MySqlDataReader = cmd.ExecuteReader()

                    If dr.Read() Then
                        Dim lastname As String = dr("lastname").ToString()
                        Dim firstname As String = dr("firstname").ToString()
                        Dim adminName As String = $"{firstname} {lastname}" ' Concatenate lastname and firstname
                        Dim empId As String = dr("empid").ToString()
                        dr.Close()
                        Dim logQuery As String = "INSERT INTO login_logout_log (username, userRole, event_type, timestamp, empid) VALUES (@username, @userRole, @event_type, @timestamp, @empid)"
                        Using logCmd As New MySqlCommand(logQuery, con)
                            logCmd.Parameters.AddWithValue("@username", unametxtbx.Text)
                            logCmd.Parameters.AddWithValue("@userRole", "Visitor Management Admin")
                            logCmd.Parameters.AddWithValue("@event_type", "Login")
                            logCmd.Parameters.AddWithValue("@timestamp", DateTime.Now)
                            logCmd.Parameters.AddWithValue("@empid", empId)

                            logCmd.ExecuteNonQuery()
                        End Using

                        adminform.adname.Text = adminName
                        adminform.uname.Text = unametxtbx.Text
                        MessageBox.Show("Login Successful", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information)
                        adminform.Show()
                        Me.Hide()
                        unametxtbx.Clear()
                        passtxtbx.Clear()
                    Else
                        MessageBox.Show("Incorrect username or password. Please try again.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
                        unametxtbx.Clear()
                        passtxtbx.Clear()
                    End If
                End Using
            End Using
        Catch ex As Exception
            MessageBox.Show("An error occurred while trying to authenticate: " & ex.Message)
        End Try

    End Sub

    Private Sub PictureBox10_Click(sender As Object, e As EventArgs) Handles PictureBox10.Click
        MessageBox.Show("Are you sure you want to exit?", "Question", MessageBoxButtons.YesNo, MessageBoxIcon.Question)
        Environment.Exit(0)
    End Sub
End Class
