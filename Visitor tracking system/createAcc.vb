Imports Emgu.CV.CvEnum
Imports MySql.Data.MySqlClient
Imports Org.BouncyCastle.Asn1.IsisMtt.X509
Imports System.IO
Imports System.Text

Public Class createAcc
    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        FormCenter.CenterForm(Me)
        FormDrag.EnableFormDragging(Me)
        con.ConnectionString = "server=localhost;username=root;passwod=;database=db_ba3102"
        con.Open()
        con.Close()
    End Sub

    Private Sub PictureBox10_Click(sender As Object, e As EventArgs) Handles PictureBox10.Click
        MessageBox.Show("Warning: It can be Unauthorized access. Please log in to proceed for security purposes.", "Warning", MessageBoxButtons.OK, MessageBoxIcon.Warning)
        Me.Hide()
        login.Show()
    End Sub

    Private Sub createAccBtnPb_Click(sender As Object, e As EventArgs) Handles createAccBtnPb.Click
        Dim empId As String = "" ' Define a variable to hold the EmpID
        Dim accountRegistered As Boolean = False ' Flag to track account registration

        con.ConnectionString = "server=localhost;username=root;password=;database=db_ba3102"
        con.Open()

        Try
            cmd.Connection = con

            ' Retrieve the EmpID corresponding to the entered search ID
            Dim searchEmpIdQuery As String = "SELECT EmpID FROM tbempinfo WHERE empId = @searchId"
            cmd.CommandText = searchEmpIdQuery
            cmd.Parameters.AddWithValue("@searchId", searchID.Text)

            ' ExecuteScalar is used assuming only one EmpID is retrieved; modify if needed
            empId = cmd.ExecuteScalar()?.ToString()

            ' Check if the EmpID already exists in login_tbl
            cmd.Parameters.Clear()
            Dim checkQuery As String = "SELECT COUNT(*) FROM account_tbl WHERE EmpID = @empId"
            cmd.CommandText = checkQuery
            cmd.Parameters.AddWithValue("@empId", empId)

            Dim count As Integer = Convert.ToInt32(cmd.ExecuteScalar())

            ' If the EmpID exists in login_tbl, display a message
            If count > 0 Then
                MessageBox.Show("This employee already has an account.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
                createUser.Text = ""
                createPass.Text = ""
                searchID.Text = ""
                CreateFname.Text = ""
                CreateLname.Text = ""
                Department.Text = ""
            Else
                ' Inserting into login_tbl if the EmpID doesn't exist
                cmd.Parameters.Clear()
                cmd.CommandText = "INSERT INTO account_tbl (userName, password, EmpID) VALUES (@uname, @pass, @empId)"
                cmd.Parameters.AddWithValue("@uname", createUser.Text)
                cmd.Parameters.AddWithValue("@pass", createPass.Text)
                cmd.Parameters.AddWithValue("@empId", empId)
                cmd.ExecuteNonQuery()

                MessageBox.Show("Account Successfully Registered", "Registered", MessageBoxButtons.OK, MessageBoxIcon.Information)
                accountRegistered = True ' Set flag indicating successful registration

                ' Clear all textboxes
                createUser.Text = ""
                createPass.Text = ""
                searchID.Text = ""
                CreateFname.Text = ""
                CreateLname.Text = ""
                Department.Text = ""

                Me.Hide() ' Hide the current form
            End If

            con.Close()

        Catch ex As Exception
            MessageBox.Show(ex.ToString())

            ' Clear all textboxes in case of an error
            createUser.Text = ""
            createPass.Text = ""
            searchID.Text = ""
            CreateFname.Text = ""
            CreateLname.Text = ""
            Department.Text = ""
        Finally
            If con.State = ConnectionState.Open Then
                con.Close()
            End If
        End Try

        ' Show the login form only if an account was successfully registered
        If accountRegistered Then
            login.Show()
        End If

    End Sub

    Private Sub searchID_TextChanged(sender As Object, e As EventArgs) Handles searchID.TextChanged
        If Not String.IsNullOrEmpty(searchID.Text) Then
            Dim adminId As String = searchID.Text

            ' Assuming the column name for AdminId is "AdminId" in the tbempinfo table
            Dim query As String = "SELECT firstname, lastname, department FROM tbempinfo WHERE empid = @adminId"

            con.ConnectionString = "server=localhost;username=root;password=;database=db_ba3102"

            Try
                Using cmd As New MySqlCommand(query, con)
                    cmd.Parameters.AddWithValue("@adminId", adminId)
                    con.Open()

                    Dim reader As MySqlDataReader = cmd.ExecuteReader()

                    If reader.HasRows Then
                        While reader.Read()
                            ' Load data into respective textboxes
                            CreateFname.Text = reader("firstname").ToString()
                            CreateLname.Text = reader("lastname").ToString()
                            Department.Text = reader("department").ToString()
                        End While
                    Else
                        ' Clear textboxes if no data found for the given AdminId
                        CreateFname.Text = ""
                        CreateLname.Text = ""
                        Department.Text = ""

                        MessageBox.Show("Employee not found!", "Not Found", MessageBoxButtons.OK, MessageBoxIcon.Information)
                    End If

                    reader.Close()
                End Using
            Catch ex As Exception
                MessageBox.Show(ex.ToString())
            Finally
                con.Close()
            End Try
        Else
            ' Clear textboxes if the searchId textbox is empty
            CreateFname.Text = ""
            CreateLname.Text = ""
            Department.Text = ""
        End If

    End Sub
End Class