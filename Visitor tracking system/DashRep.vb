Imports System.Data.SqlClient
Imports MySql.Data.MySqlClient
Imports System.Windows.Forms.VisualStyles.VisualStyleElement
Imports OpenTK.Graphics.OpenGL.GL
Imports System.Drawing.Drawing2D
Imports System.IO
Imports System.Drawing.Printing

Public Class DashRep
    Private printDocument As New PrintDocument()
    Private printDialog As New PrintDialog()
    Private printPreviewDialog As New PrintPreviewDialog()

    Private Sub DashRep_Load(sender As Object, e As EventArgs) Handles MyBase.Load

        AddHandler printDocument.PrintPage, AddressOf PrintDocument1_PrintPage


        printPreviewDialog.Document = printDocument


        printDialog.Document = printDocument


        FormCenter.CenterForm(Me)
        FormDrag.EnableFormDragging(Me)
        DataGridView1.EnableHeadersVisualStyles = False
        DataGridView1.ColumnHeadersDefaultCellStyle.BackColor = Color.LimeGreen
        DataGridView1.ColumnHeadersDefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter
        DataGridView1.ColumnHeadersDefaultCellStyle.Font = New Font("tahoma", 10, FontStyle.Bold)
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")
        Dim Libquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'Library'"
        Dim Regquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'Registrar Office'"
        Dim Cliquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'Clinic'"
        Dim Rgoquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'RGO Office'"
        Dim Cecsquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'CECS Building/Office'"
        Dim Hebquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'HEB Building/Office'"
        Dim Oldquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'OLD Building/Office'"
        Dim courtquery As String = "SELECT COUNT(*) FROM visiting_infotbl WHERE point_of_interest = 'Covered Court'"
        Try
            con.Open()
            Using Libcommand As New MySqlCommand(Libquery, con)
                Dim totalLibRecords As Integer = CInt(Libcommand.ExecuteScalar())


                libCount.Text = totalLibRecords.ToString()
            End Using

            Using Regcommand As New MySqlCommand(Regquery, con)
                Dim totalRegRecords As Integer = CInt(Regcommand.ExecuteScalar())


                RegCount.Text = totalRegRecords.ToString()
            End Using

            Using Clicommand As New MySqlCommand(Cliquery, con)
                Dim totalCliRecords As Integer = CInt(Clicommand.ExecuteScalar())


                CliCount.Text = totalCliRecords.ToString()
            End Using

            Using Rgocommand As New MySqlCommand(Rgoquery, con)
                Dim totalRgoRecords As Integer = CInt(Rgocommand.ExecuteScalar())


                RgoCount.Text = totalRgoRecords.ToString()
            End Using

            Using Cecscommand As New MySqlCommand(Cecsquery, con)
                Dim totalCecsRecords As Integer = CInt(Cecscommand.ExecuteScalar())


                CecsCount.Text = totalCecsRecords.ToString()
            End Using

            Using Hebcommand As New MySqlCommand(Hebquery, con)
                Dim totalHebRecords As Integer = CInt(Hebcommand.ExecuteScalar())


                HebCount.Text = totalHebRecords.ToString()
            End Using

            Using Oldcommand As New MySqlCommand(Oldquery, con)
                Dim totalOldRecords As Integer = CInt(Oldcommand.ExecuteScalar())


                OldCount.Text = totalOldRecords.ToString()
            End Using

            Using courtcommand As New MySqlCommand(courtquery, con)
                Dim totalCourtRecords As Integer = CInt(courtcommand.ExecuteScalar())


                CourtCount.Text = totalCourtRecords.ToString()
            End Using

            Label2.Text = " "

        Catch ex As Exception
            MessageBox.Show("Error: " & ex.Message)
        End Try
    End Sub

    Private Sub LibraryButton_Click(sender As Object, e As EventArgs) Handles LibraryButton.Click

        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try

            con.Open()


            Dim allLibquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'Library'"


            Dim cmd As New MySqlCommand(allLibquery, con)


            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()


            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")

            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If

        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub RegistrarButton_Click(sender As Object, e As EventArgs) Handles RegistrarButton.Click
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try

            con.Open()


            Dim allLibquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'Registrar Office'"


            Dim cmd As New MySqlCommand(allLibquery, con)


            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()


            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")
            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If

        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub ClinicButton_Click(sender As Object, e As EventArgs) Handles ClinicButton.Click
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try

            con.Open()


            Dim allLibquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'Clinic'"


            Dim cmd As New MySqlCommand(allLibquery, con)


            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()


            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")

            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If

        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub RgoButton_Click(sender As Object, e As EventArgs) Handles RgoButton.Click
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try

            con.Open()


            Dim allLibquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'RGO Office'"


            Dim cmd As New MySqlCommand(allLibquery, con)


            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()


            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")

            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If
        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub CICSButton_Click(sender As Object, e As EventArgs) Handles CICSButton.Click
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try

            con.Open()


            Dim allLibquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'CECS Building/Office'"


            Dim cmd As New MySqlCommand(allLibquery, con)


            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()


            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")

            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If

        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub HEBButton_Click(sender As Object, e As EventArgs) Handles HEBButton.Click
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try

            con.Open()


            Dim allLibquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'HEB Building/Office'"


            Dim cmd As New MySqlCommand(allLibquery, con)


            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()


            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")

            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If

        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub OLDButton_Click(sender As Object, e As EventArgs) Handles OLDButton.Click
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try

            con.Open()


            Dim allLibquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'OLD Building/Office'"


            Dim cmd As New MySqlCommand(allLibquery, con)


            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()


            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")

            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If


        Catch ex As Exception

            MessageBox.Show("An error occurred: " & ex.Message)
        Finally

            con.Close()
        End Try
    End Sub

    Private Sub Panel1_Paint(sender As Object, e As PaintEventArgs) Handles Panel1.Paint
        Dim gradBrush As New LinearGradientBrush(Me.ClientRectangle, Color.Red, Color.White, LinearGradientMode.BackwardDiagonal)
        e.Graphics.FillRectangle(gradBrush, Me.ClientRectangle)
    End Sub

    Private Sub PictureBox10_Click(sender As Object, e As EventArgs) Handles PictureBox10.Click
        Dim response As Integer
        response = MessageBox.Show("Are you sure you want to exit?", "Exit?", MessageBoxButtons.YesNo, MessageBoxIcon.Question)
        If response = vbYes Then
            Me.Hide()
            adminform.Show()
        End If
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Dim con As New MySqlConnection("server=localhost;user=root;password=;database=db_ba3102")

        Try
            con.Open()
            Dim allCourtquery As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
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
                                    "WHERE visiting_infotbl.point_of_interest = 'Covered Court'"

            Dim cmd As New MySqlCommand(allCourtquery, con)

            Dim adapter As New MySqlDataAdapter(cmd)
            Dim ds As New DataSet()

            adapter.Fill(ds, "Visitors")

            DataGridView1.DataSource = ds.Tables("Visitors")

            Dim rowIndex As Integer = 0

            If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
                ' Check if the column "Point of Interest" exists before accessing its value
                Dim poiColumnIndex As Integer = DataGridView1.Columns("Point of Interest").Index

                If poiColumnIndex >= 0 AndAlso poiColumnIndex < DataGridView1.Columns.Count Then
                    Dim cell As DataGridViewCell = DataGridView1.Rows(rowIndex).Cells(poiColumnIndex)

                    ' Check if the cell is not null before accessing its value
                    If cell IsNot Nothing AndAlso cell.Value IsNot Nothing Then
                        Dim reportName As String = cell.Value.ToString()
                        Label2.Text = reportName & " Report "
                        visitor_pboxad.Image = Nothing
                        visitorID_pboxad.Image = Nothing
                    Else
                        ' Handle the case where the cell or its value is null
                        Label2.Text = "No Record Fetched"
                    End If
                End If
            End If

        Catch ex As Exception
            MessageBox.Show("An error occurred: " & ex.Message)
        Finally
            con.Close()
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


    Private Sub PrintDocument1_PrintPage(sender As Object, e As PrintPageEventArgs) Handles PrintDocument1.PrintPage

        Dim dataGridViewToPrint As DataGridView = DataGridView1


        Dim printArea As New Rectangle(50, 50, e.PageBounds.Width - 100, e.PageBounds.Height - 100)


        Dim bitmap As New Bitmap(dataGridViewToPrint.Width, dataGridViewToPrint.Height)
        dataGridViewToPrint.DrawToBitmap(bitmap, dataGridViewToPrint.ClientRectangle)


        Dim numPages As Integer = CInt(Math.Ceiling(CDec(dataGridViewToPrint.Height) / printArea.Height))


        Dim sourceRect As New Rectangle(0, 0, dataGridViewToPrint.Width, printArea.Height)


        Dim labelFont As New Font("Arial", 12, FontStyle.Bold)
        Dim labelRect As New Rectangle(printArea.Left, printArea.Top, printArea.Width, 50)
        Dim labelFormat As New StringFormat()
        labelFormat.Alignment = StringAlignment.Center


        e.Graphics.DrawString("Batangas State University", labelFont, Brushes.Black, labelRect, labelFormat)
        labelRect.Y += 30


        e.Graphics.DrawString("Lipa Campus", labelFont, Brushes.Black, labelRect, labelFormat)
        labelRect.Y += 30


        e.Graphics.DrawString($"Date Printed: {DateTime.Now.ToString("yyyy-MM-dd")}", labelFont, Brushes.Black, labelRect, labelFormat)
        labelRect.Y += 30


        Dim rowIndex As Integer = 0
        If rowIndex >= 0 AndAlso rowIndex < DataGridView1.Rows.Count Then
            Dim documentName As String = DataGridView1.Rows(rowIndex).Cells("Point of Interest").Value.ToString()
            e.Graphics.DrawString($"Document Name: {documentName}", labelFont, Brushes.Black, labelRect, labelFormat)
        Else

            MessageBox.Show("Invalid row index.")
        End If


        labelRect.Y += 90


        Dim dataGridViewRect As New Rectangle((e.PageBounds.Width - dataGridViewToPrint.Width) \ 2, labelRect.Bottom, dataGridViewToPrint.Width, e.PageBounds.Height - labelRect.Bottom - 50)


        For i As Integer = 0 To numPages - 1

            sourceRect.Y = i * printArea.Height


            e.Graphics.DrawImage(bitmap, dataGridViewRect, sourceRect, GraphicsUnit.Pixel)


            e.HasMorePages = (i < numPages - 1)
        Next
    End Sub

    Private Sub PictureBox12_Click(sender As Object, e As EventArgs) Handles PictureBox12.Click
        If printDialog.ShowDialog() = DialogResult.OK Then
            printDocument.Print()
        End If
    End Sub

    Private Sub PictureBox13_Click(sender As Object, e As EventArgs) Handles PictureBox13.Click
        printPreviewDialog.ShowDialog()
        PrintDocument1.DefaultPageSettings.Landscape = True
    End Sub
End Class
