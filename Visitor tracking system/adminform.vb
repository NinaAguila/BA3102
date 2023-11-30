Imports System.Drawing.Drawing2D
Imports System.IO
Imports System.Windows.Forms.Design
Imports MySql.Data.MySqlClient
Imports Mysqlx.XDevAPI.Relational
Imports Org.BouncyCastle.Tls

Public Class adminform
    Dim dt As New DataTable

    Private Sub adminform_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        FormCenter.CenterForm(Me)
        FormDrag.EnableFormDragging(Me)
        DataGridView1.EnableHeadersVisualStyles = False
        DataGridView1.ColumnHeadersDefaultCellStyle.BackColor = Color.LimeGreen
        DataGridView1.ColumnHeadersDefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter
        DataGridView1.ColumnHeadersDefaultCellStyle.Font = New Font("tahoma", 10, FontStyle.Bold)
        Try
            Dim con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")
            con.Open()
            Dim cmd As New MySqlCommand("SELECT visitor_infotbl.visitor_no AS 'Visitor Number', visitor_infotbl.visitor_name AS 'Visitor Name', visitor_infotbl.visitor_add AS 'Visitor Address', visitor_infotbl.visitor_contact_no AS 'Contact Number', visitor_infotbl.visitor_photo AS 'Visitor Photo', visitor_infotbl.visitorID_photo AS 'Visitor ID Photo', 
                                        visiting_infotbl.point_of_interest AS 'Point of Interest', visiting_infotbl.purpose AS 'Purpose',visiting_infotbl.time_of_visit AS 'Time of Visit', visiting_infotbl.time_in AS 'Time In', visiting_infotbl.time_out AS 'Time Out' 
                                        FROM visitor_infotbl INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no", con)

            Dim adapter As New MySqlDataAdapter
            adapter.SelectCommand = cmd
            Dim dt As New DataTable
            dt.Clear()
            adapter.Fill(dt)
            DataGridView1.DataSource = dt

            Dim Countquery As String = "SELECT COUNT(*) FROM visiting_infotbl"
            Using Countcommand As New MySqlCommand(Countquery, con)
                Dim totalRecords As Integer = CInt(Countcommand.ExecuteScalar())


                Label7.Text = "We have a total of " & totalRecords.ToString() & " visitor records as of " & DateTime.Now.ToString("MM-dd-yyyy")
            End Using

        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        End Try
    End Sub


    Sub loadData()

        Try
            Dim con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")
            con.Open()
            Dim cmd As New MySqlCommand("SELECT visitor_infotbl.visitor_no AS 'Visitor Number', visitor_infotbl.visitor_name AS 'Visitor Name', visitor_infotbl.visitor_add AS 'Visitor Address', visitor_infotbl.visitor_contact_no AS 'Contact Number', visitor_infotbl.visitor_photo AS 'Visitor Photo', visitor_infotbl.visitorID_photo AS 'Visitor ID Photo', 
                                        visiting_infotbl.point_of_interest AS 'Point of Interest', visiting_infotbl.purpose AS 'Purpose',visiting_infotbl.time_of_visit AS 'Date of Visit', visiting_infotbl.time_in AS 'Time In', visiting_infotbl.time_out AS 'Time Out' 
                                        FROM visitor_infotbl INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no", con)
            adapter.SelectCommand = cmd
            dt.Clear()
            adapter.Fill(dt)
            DataGridView1.DataSource = dt
            con.Close()
        Catch ex As Exception
            MessageBox.Show(ex.ToString)
        End Try
    End Sub

    Private Sub DataGridView1_Click(sender As Object, e As EventArgs) Handles DataGridView1.Click
        Try
            Dim selectedRow As DataGridViewRow = DataGridView1.CurrentRow

            If selectedRow IsNot Nothing Then
                Dim cell1 = selectedRow.Cells(4)
                Dim cell2 = selectedRow.Cells(5)

                If cell1.Value IsNot Nothing AndAlso TypeOf cell1.Value Is Byte() Then
                    Dim data1 As Byte() = DirectCast(cell1.Value, Byte())
                    Dim ms1 As New MemoryStream(data1)
                    visitor_pboxad.Image = Image.FromStream(ms1)
                End If

                If cell2.Value IsNot Nothing AndAlso TypeOf cell2.Value Is Byte() Then
                    Dim data2 As Byte() = DirectCast(cell2.Value, Byte())
                    Dim ms2 As New MemoryStream(data2)
                    visitorID_pboxad.Image = Image.FromStream(ms2)
                End If
            End If
        Catch ex As Exception
            MessageBox.Show("An error occurred: " & ex.Message)
        End Try
    End Sub


    Private Sub AdsearchTxtbx_TextChanged(sender As Object, e As EventArgs) Handles AdsearchTxtbx.TextChanged
        Dim visitorName As String = AdsearchTxtbx.Text

        If Not String.IsNullOrWhiteSpace(visitorName) Then
            visitor_pboxad.Image = Nothing
            visitorID_pboxad.Image = Nothing
            LoadVisitorData(visitorName)
        Else
            LoadVisitorData("")
        End If
    End Sub

    Sub LoadVisitorData(visitorName As String)
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")
        Dim query As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
                             "visitor_infotbl.visitor_name AS 'Visitor Name', " &
                             "visitor_infotbl.visitor_add AS 'Visitor Address', " &
                             "visitor_infotbl.visitor_contact_no AS 'Contact Number', " &
                             "visitor_infotbl.visitor_photo AS 'Visitor Photo', " &
                             "visitor_infotbl.visitorID_photo AS 'Visitor ID Photo', " &
                             "visiting_infotbl.point_of_interest AS 'Point of Interest', " &
                             "visiting_infotbl.purpose AS 'Purpose', " &
                             "visiting_infotbl.time_of_visit AS 'Date of Visit', " &
                             "visiting_infotbl.time_in AS 'Time In', " &
                             "visiting_infotbl.time_out AS 'Time Out' " &
                             "FROM visitor_infotbl " &
                             "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                             "WHERE visitor_infotbl.visitor_name LIKE @VisitorName"
        Dim adapter As New MySqlDataAdapter(query, con)
        adapter.SelectCommand.Parameters.AddWithValue("@VisitorName", "%" & visitorName & "%")
        Dim ds As New DataSet()
        adapter.Fill(ds, "Visitors")
        DataGridView1.DataSource = ds.Tables("Visitors")

    End Sub

    Private Sub viewreportbtn_Click(sender As Object, e As EventArgs) Handles viewreportbtn.Click
        Me.Hide()
        DashRep.Show()
    End Sub

    Private Sub d1_ValueChanged(sender As Object, e As EventArgs) Handles d1.ValueChanged
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")
        con.Open()

        Dim query As String = "SELECT " &
        "visitor_infotbl.visitor_no AS 'Visitor Number', " &
        "visitor_infotbl.visitor_name AS 'Visitor Name', " &
        "visitor_infotbl.visitor_add AS 'Visitor Address', " &
        "visitor_infotbl.visitor_contact_no AS 'Contact Number', " &
        "visitor_infotbl.visitor_photo AS 'Visitor Photo', " &
        "visitor_infotbl.visitorID_photo AS 'Visitor ID Photo', " &
        "visiting_infotbl.point_of_interest AS 'Point of Interest', " &
        "visiting_infotbl.purpose AS 'Purpose', " &
        "visiting_infotbl.time_of_visit AS 'Date of Visit', " &
        "visiting_infotbl.time_in AS 'Time In', " &
        "visiting_infotbl.time_out AS 'Time Out' " &
        "FROM visitor_infotbl " &
        "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
        "WHERE visiting_infotbl.time_of_visit = @par_date Order By visiting_infotbl.time_of_visit" ' Records within the date range

        Dim cmd As New MySqlCommand(query, con)
        cmd.Parameters.AddWithValue("@par_date", d1.Value.Date)

        Dim da As New MySqlDataAdapter(cmd)
        Dim dt As New DataTable
        da.Fill(dt)
        DataGridView1.DataSource = dt

        con.Close()
    End Sub

    Private Sub createacc_Click(sender As Object, e As EventArgs) Handles createbtn.Click
        Me.Close()
        createAcc.Show()
    End Sub


    Private Sub logoutbtn_Click(sender As Object, e As EventArgs) Handles logoutbtn.Click
        Dim response As DialogResult
        response = MessageBox.Show("Are you sure you want to logout?", "Logout?", MessageBoxButtons.YesNo, MessageBoxIcon.Question)

        If response = DialogResult.Yes Then
            Try
                Using con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")
                    con.Open()

                    ' Assuming 'uname.Text' contains the username of the logged-in user
                    Dim empIdQuery As String = "SELECT empid FROM account_tbl WHERE username = @username"
                    Using empIdCmd As New MySqlCommand(empIdQuery, con)
                        empIdCmd.Parameters.AddWithValue("@username", uname.Text)
                        Dim dr As MySqlDataReader = empIdCmd.ExecuteReader()

                        If dr.Read() Then
                            Dim empId As String = dr("empid").ToString()

                            dr.Close()
                            Dim logQuery As String = "INSERT INTO login_logout_log (username, userRole, event_type, timestamp, empid) VALUES (@username, @userRole, @event_type, @timestamp, @empid)"
                            Using logCmd As New MySqlCommand(logQuery, con)
                                logCmd.Parameters.AddWithValue("@username", uname.Text)
                                logCmd.Parameters.AddWithValue("@userRole", "Visitor Management Admin")
                                logCmd.Parameters.AddWithValue("@event_type", "Logout")
                                logCmd.Parameters.AddWithValue("@timestamp", DateTime.Now)
                                logCmd.Parameters.AddWithValue("@empid", empId)

                                logCmd.ExecuteNonQuery()
                            End Using

                            Me.Hide()
                            ' Replace 'login' with your actual login form instance
                            Dim loginForm As New login()
                            loginForm.Show()
                        End If
                    End Using
                End Using
            Catch ex As Exception
                MessageBox.Show("An error occurred while trying to logout: " & ex.Message)
            End Try
        End If


    End Sub

    Private Sub Panel1_Paint(sender As Object, e As PaintEventArgs) Handles Panel1.Paint
        Dim gradBrush As New LinearGradientBrush(Me.ClientRectangle, Color.Red, Color.White, LinearGradientMode.BackwardDiagonal)
        e.Graphics.FillRectangle(gradBrush, Me.ClientRectangle)
    End Sub


    Private Sub PrintDocument_PrintPage(sender As Object, e As Printing.PrintPageEventArgs)
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")
        Dim currentDate As String = "Date: " & Date.Today.ToString("MM-dd-yyyy")
        con.Open()

        Dim totalRecordsQuery As String = "SELECT COUNT(*) FROM visitor_infotbl"
        Dim totalRecordsCmd As New MySqlCommand(totalRecordsQuery, con)
        Dim totalRecords = CInt(totalRecordsCmd.ExecuteScalar())

        Dim Libquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'Library'"
        Dim Libcmd As New MySqlCommand(Libquery, con)
        Dim Librecords = CInt(Libcmd.ExecuteScalar())

        Dim Regquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'Registrar Office'"
        Dim Regcmd As New MySqlCommand(Regquery, con)
        Dim Regrecords = CInt(Regcmd.ExecuteScalar())

        Dim Cliquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'Clinic'"
        Dim Clicmd As New MySqlCommand(Cliquery, con)
        Dim Clirecords = CInt(Clicmd.ExecuteScalar())

        Dim Rgoquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'RGO Office'"
        Dim Rgocmd As New MySqlCommand(Rgoquery, con)
        Dim Rgorecords = CInt(Rgocmd.ExecuteScalar())

        Dim Cecsquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'CECS Building/Office'"
        Dim Cecscmd As New MySqlCommand(Cecsquery, con)
        Dim Cecsrecords = CInt(Cecscmd.ExecuteScalar())

        Dim Hebquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'HEB Building/Office'"
        Dim Hebcmd As New MySqlCommand(Hebquery, con)
        Dim Hebrecords = CInt(Hebcmd.ExecuteScalar())

        Dim Oldquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'OLD Building/Office'"
        Dim Oldcmd As New MySqlCommand(Oldquery, con)
        Dim Oldrecords = CInt(Oldcmd.ExecuteScalar())

        Dim Courtquery As String = "SELECT COUNT(*) FROM visitor_infotbl " &
                                      "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                                      "WHERE visiting_infotbl.point_of_interest = 'Covered Court'"
        Dim Courtcmd As New MySqlCommand(Courtquery, con)
        Dim Courtrecords = CInt(Courtcmd.ExecuteScalar())


        Dim printFont As New Font("Arial", 14)
        Dim printBrush As New SolidBrush(Color.Black)


        Dim printArea As New RectangleF(100, 100, 400, 200)


        e.Graphics.DrawString("Batangas State University", printFont, printBrush, printArea.Left, printArea.Top)
        e.Graphics.DrawString("Lipa Campus", printFont, printBrush, printArea.Left, printArea.Top + 40)
        e.Graphics.DrawString(currentDate, printFont, printBrush, printArea.Left, printArea.Top + 80)
        e.Graphics.DrawString("-----------------------------------", printFont, printBrush, printArea.Left, printArea.Top + 120)
        e.Graphics.DrawString("Total Records: " & totalRecords, printFont, printBrush, printArea.Left, printArea.Top + 160)
        e.Graphics.DrawString("Library: " & Librecords, printFont, printBrush, printArea.Left, printArea.Top + 200)
        e.Graphics.DrawString("Registrar Office: " & Regrecords, printFont, printBrush, printArea.Left, printArea.Top + 240)
        e.Graphics.DrawString("Clinic: " & Clirecords, printFont, printBrush, printArea.Left, printArea.Top + 280)
        e.Graphics.DrawString("RGO Office: " & Rgorecords, printFont, printBrush, printArea.Left, printArea.Top + 320)
        e.Graphics.DrawString("CECS Building/Office: " & Cecsrecords, printFont, printBrush, printArea.Left, printArea.Top + 360)
        e.Graphics.DrawString("HEB Building/Office: " & Hebrecords, printFont, printBrush, printArea.Left, printArea.Top + 400)
        e.Graphics.DrawString("OLD Building/Office: " & Oldrecords, printFont, printBrush, printArea.Left, printArea.Top + 440)
        e.Graphics.DrawString("Covered Court: " & Courtrecords, printFont, printBrush, printArea.Left, printArea.Top + 480)

        con.Close()
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Try

            Dim printDoc As New Printing.PrintDocument()


            Dim printDialog As New PrintDialog()
            printDialog.Document = printDoc


            If printDialog.ShowDialog() = DialogResult.OK Then

                AddHandler printDoc.PrintPage, AddressOf PrintDocument_PrintPage


                printDoc.Print()
            End If
        Catch ex As Exception
            MessageBox.Show(ex.ToString())
        End Try
    End Sub

    Private Sub reloadBtnPb_Click(sender As Object, e As EventArgs) Handles reloadBtnPb.Click
        AdsearchTxtbx.Clear()
        visitor_pboxad.Image = Nothing
        visitorID_pboxad.Image = Nothing
        d1.Value = DateTime.Today
        loadData()
    End Sub
End Class