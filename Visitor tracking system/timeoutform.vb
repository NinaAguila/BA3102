Imports System.Drawing.Drawing2D
Imports System.IO
Imports MySql.Data.MySqlClient
Imports Mysqlx
Imports OpenTK

Public Class timeoutform

    Dim con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")

    Sub LoadVisitorData(visitorNo As Integer)
        Dim query As String = "SELECT visitor_infotbl.visitor_no AS 'Visitor Number', " &
                     "visitor_infotbl.visitor_name AS 'Visitor Name', " &
                     "visiting_infotbl.time_in AS 'Time In', " &
                     "visiting_infotbl.time_out AS 'Time Out' " &
                     "FROM visitor_infotbl " &
                     "INNER JOIN visiting_infotbl ON visitor_infotbl.visitor_no = visiting_infotbl.visiting_no " &
                     "WHERE visitor_infotbl.visitor_no = @VisitorNo"
        Dim adapter As New MySqlDataAdapter(query, con)
        adapter.SelectCommand.Parameters.AddWithValue("@VisitorNo", visitorNo)
        Dim ds As New DataSet()
        adapter.Fill(ds, "Visitors")
        DataGridView1.DataSource = ds.Tables("Visitors")
    End Sub

    Private Sub searchTxtbx_TextChanged(sender As Object, e As EventArgs) Handles searchTxtbx.TextChanged
        Dim visitorNo As Integer
        If Integer.TryParse(searchTxtbx.Text, visitorNo) Then
            LoadVisitorData(visitorNo)
        Else
            DataGridView1.DataSource = Nothing
        End If
    End Sub

    Private Function GetVisitorName(visitorNo As Integer) As String
        Dim query As String = "SELECT visitor_name FROM visitor_infotbl WHERE visitor_no = @VisitorNo"
        Using cmd As New MySqlCommand(query, con)
            cmd.Parameters.AddWithValue("@VisitorNo", visitorNo)
            Dim result As Object = cmd.ExecuteScalar()
            con.Close()

            If result IsNot Nothing Then
                Return result.ToString()
            Else
                Return "Visitor Not Found"
            End If
        End Using
    End Function

    Private Sub timeoutform_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        FormDrag.EnableFormDragging(Me)
        FormCenter.CenterForm(Me)
        DataGridView1.EnableHeadersVisualStyles = False
        DataGridView1.ColumnHeadersDefaultCellStyle.BackColor = Color.LimeGreen
        DataGridView1.ColumnHeadersDefaultCellStyle.Alignment = DataGridViewContentAlignment.MiddleCenter
        DataGridView1.ColumnHeadersDefaultCellStyle.Font = New Font("tahoma", 10, FontStyle.Bold)
    End Sub

    Private Sub Panel1_Paint(sender As Object, e As PaintEventArgs) Handles Panel1.Paint
        Dim gradBrush As New LinearGradientBrush(Me.ClientRectangle, Color.Red, Color.White, LinearGradientMode.BackwardDiagonal)
        e.Graphics.FillRectangle(gradBrush, Me.ClientRectangle)
    End Sub

    Private Sub timeoutbtnPb_Click(sender As Object, e As EventArgs) Handles timeoutbtnPb.Click
        Try
            Dim visitorNo As Integer
            If Integer.TryParse(searchTxtbx.Text, visitorNo) Then
                Dim currentTime As DateTime = DateTime.Now
                Dim formattedTime As String = currentTime.ToString("hh:mm tt", System.Globalization.CultureInfo.InvariantCulture)


                Dim updateQuery As String = "UPDATE visiting_infotbl SET time_out = @TimeOut WHERE visiting_no = @VisitingNo"
                con.Open()
                Using updateCommand As New MySqlCommand(updateQuery, con)
                    updateCommand.Parameters.AddWithValue("@TimeOut", formattedTime)
                    updateCommand.Parameters.AddWithValue("@VisitingNo", visitorNo)
                    updateCommand.ExecuteNonQuery()

                    Dim visitorName As String = GetVisitorName(visitorNo)

                    If visitorName = "Visitor Not Found" Then
                        MessageBox.Show("Visitor not found. Please enter a correct visitor number.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
                    Else

                        LoadVisitorData(visitorNo)
                        MessageBox.Show($"Time-Out updated successfully for:" & vbCrLf & $"Visitor Number: {visitorNo}" & vbCrLf & $"Name: {visitorName}", "Updated", MessageBoxButtons.OK, MessageBoxIcon.Information)
                        searchTxtbx.Clear()
                        MessageBox.Show("Thankyou for visiting in our campus!", "Thankyou", MessageBoxButtons.OK, MessageBoxIcon.Information)
                        Me.Hide()
                        Menu.visitorbtnPb.Enabled = True
                        Menu.Show()
                    End If
                End Using
            Else
                MessageBox.Show("Invalid Visitor No. Please enter a valid number.")
            End If
        Catch ex As Exception
            MessageBox.Show("An error occurred: " & ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
        Finally
            con.Close()
        End Try
    End Sub
End Class