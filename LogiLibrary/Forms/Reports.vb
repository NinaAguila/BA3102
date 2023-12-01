Imports System.IO
Imports MySql.Data.MySqlClient
Public Class Reports
    Private Sub btnBack_Click(sender As Object, e As EventArgs) Handles btnBack.Click
        Me.Hide()
        MainDashboard.Show()
    End Sub

    Private Sub btnExit_Click(sender As Object, e As EventArgs) Handles btnExit.Click
        End
    End Sub

    Private Sub Reports_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        strconnection()
        DataGridView1.RowTemplate.Height = 30
        studloadData()
    End Sub

    Public Sub studloadData()
        DataGridView2.Rows.Clear()
        Try
            strcon.Open()
            Dim cmd As New MySqlCommand("SELECT tbl_studentlogs.SrCode, CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) AS Fullname, tbl_student.StudentAddress, tbl_student.StudentContactNo, tbl_student.StudentDepartment, tbl_studentlogs.LogDate, tbl_studentlogs.TimeIn, tbl_studentlogs.TimeOut, tbl_studentlogs.inStatus, tbl_studentlogs.outStatus FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode INNER JOIN tb_studinfo ON tb_studinfo.studid = tbl_student.studid;", strcon)
            dr = cmd.ExecuteReader
            While dr.Read = True
                DataGridView2.Rows.Add(dr.Item("SrCode").ToString, dr.Item("Fullname").ToString, dr.Item("StudentAddress").ToString, dr.Item("StudentContactNo").ToString, dr.Item("StudentDepartment").ToString, dr.Item("LogDate").ToString, dr.Item("TimeIn").ToString, dr.Item("inStatus").ToString, dr.Item("TimeOut").ToString, dr.Item("outStatus").ToString)
            End While

        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
        strcon.Close()
    End Sub

    Private Sub txtSearch_TextChanged(sender As Object, e As EventArgs) Handles txtSearch.TextChanged
        DataGridView2.Rows.Clear()
        DataGridView1.Rows.Clear()
        Try
            strcon.Open()
            ' Check if the search term matches student data
            Using studentCmd As New MySqlCommand("SELECT tbl_studentlogs.SrCode, CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) AS Fullname, tbl_student.StudentAddress, tbl_student.StudentContactNo, tbl_student.StudentDepartment, tbl_studentlogs.LogDate, tbl_studentlogs.TimeIn, tbl_studentlogs.TimeOut, tbl_studentlogs.inStatus, tbl_studentlogs.outStatus FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode INNER JOIN tb_studinfo ON tb_studinfo.studid = tbl_student.studid WHERE tbl_studentlogs.SrCode LIKE '%" & txtSearch.Text & "%' OR CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) LIKE '%" & txtSearch.Text & "%' OR tbl_student.StudentDepartment LIKE '%" & txtSearch.Text & "%'", strcon)
                Using studentDr = studentCmd.ExecuteReader
                    While studentDr.Read()
                        DataGridView2.Rows.Add(studentDr.Item("SrCode").ToString, studentDr.Item("Fullname").ToString, studentDr.Item("StudentAddress").ToString, studentDr.Item("StudentContactNo").ToString, studentDr.Item("StudentDepartment").ToString, studentDr.Item("LogDate").ToString, studentDr.Item("TimeIn").ToString, studentDr.Item("inStatus").ToString, studentDr.Item("TimeOut").ToString, studentDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

            ' Check if the search term matches visitor data
            Using visitorCmd As New MySqlCommand("SELECT tbl_visitorlogs.VisitorName, tbl_visitor.VisitorAddress, tbl_visitor.VisitorContactNo, tbl_visitor.VisitorSchool, tbl_visitorlogs.LogDate, tbl_visitorlogs.TimeIn, tbl_visitorlogs.TimeOut, tbl_visitorlogs.inStatus, tbl_visitorlogs.outStatus FROM tbl_visitorlogs INNER JOIN tbl_visitor ON tbl_visitorlogs.VisitorName = tbl_visitor.VisitorName WHERE tbl_visitorlogs.VisitorName LIKE '%" & txtSearch.Text & "%'", strcon)
                Using visitorDr = visitorCmd.ExecuteReader
                    While visitorDr.Read()
                        DataGridView1.Rows.Add(visitorDr.Item("VisitorName").ToString, visitorDr.Item("VisitorAddress").ToString, visitorDr.Item("VisitorContactNo").ToString, visitorDr.Item("VisitorSchool").ToString, visitorDr.Item("LogDate").ToString, visitorDr.Item("TimeIn").ToString, visitorDr.Item("inStatus").ToString, visitorDr.Item("TimeOut").ToString, visitorDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
        strcon.Close()
    End Sub

    Public Sub visitorloadData()
        DataGridView1.Rows.Clear()
        Try
            strcon.Open()
            Dim cmd As New MySqlCommand("SELECT tbl_visitorlogs.VisitorName, tbl_visitor.VisitorAddress, tbl_visitor.VisitorContactNo, tbl_visitor.VisitorSchool, 
tbl_visitorlogs.LogDate, tbl_visitorlogs.TimeIn, tbl_visitorlogs.TimeOut, tbl_visitorlogs.inStatus, tbl_visitorlogs.outStatus FROM tbl_visitorlogs INNER JOIN 
tbl_visitor ON tbl_visitorlogs.VisitorName = tbl_visitor.VisitorName;", strcon)
            dr = cmd.ExecuteReader
            While dr.Read = True
                DataGridView1.Rows.Add(dr.Item("VisitorName").ToString, dr.Item("VisitorAddress").ToString, dr.Item("VisitorContactNo").ToString, dr.Item("VisitorSchool").ToString, dr.Item("LogDate").ToString, dr.Item("TimeIn").ToString, dr.Item("inStatus").ToString, dr.Item("TimeOut").ToString, dr.Item("outStatus").ToString)
            End While

        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
        strcon.Close()
    End Sub

    Private Sub TabControl1_Selecting(sender As Object, e As TabControlCancelEventArgs) Handles TabControl1.Selecting
        visitorloadData()
    End Sub

    Private Sub rad_Today_CheckedChanged(sender As Object, e As EventArgs) Handles rad_Today.CheckedChanged
        DataGridView2.Rows.Clear()
        DataGridView1.Rows.Clear()

        Try
            strcon.Open()

            ' Filter today's report for student logs
            Using studentCmd As New MySqlCommand("SELECT tbl_studentlogs.SrCode, CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) AS Fullname, tbl_student.StudentAddress, tbl_student.StudentContactNo, tbl_student.StudentDepartment, tbl_studentlogs.LogDate, tbl_studentlogs.TimeIn, tbl_studentlogs.TimeOut, tbl_studentlogs.inStatus, tbl_studentlogs.outStatus FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode INNER JOIN tb_studinfo ON tb_studinfo.studid = tbl_student.studid WHERE tbl_studentlogs.LogDate LIKE '%" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "%'", strcon)
                Using studentDr = studentCmd.ExecuteReader
                    While studentDr.Read()
                        DataGridView2.Rows.Add(studentDr.Item("SrCode").ToString, studentDr.Item("Fullname").ToString, studentDr.Item("StudentAddress").ToString, studentDr.Item("StudentContactNo").ToString, studentDr.Item("StudentDepartment").ToString, studentDr.Item("LogDate").ToString, studentDr.Item("TimeIn").ToString, studentDr.Item("inStatus").ToString, studentDr.Item("TimeOut").ToString, studentDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

            ' Filter today's report for visitor logs
            Using visitorCmd As New MySqlCommand("SELECT tbl_visitorlogs.VisitorName, tbl_visitor.VisitorAddress, tbl_visitor.VisitorContactNo, tbl_visitor.VisitorSchool, tbl_visitorlogs.LogDate, tbl_visitorlogs.TimeIn, tbl_visitorlogs.TimeOut, tbl_visitorlogs.inStatus, tbl_visitorlogs.outStatus FROM tbl_visitorlogs INNER JOIN tbl_visitor ON tbl_visitorlogs.VisitorName = tbl_visitor.VisitorName WHERE tbl_visitorlogs.LogDate LIKE '%" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "%'", strcon)
                Using visitorDr = visitorCmd.ExecuteReader
                    While visitorDr.Read()
                        DataGridView1.Rows.Add(visitorDr.Item("VisitorName").ToString, visitorDr.Item("VisitorAddress").ToString, visitorDr.Item("VisitorContactNo").ToString, visitorDr.Item("VisitorSchool").ToString, visitorDr.Item("LogDate").ToString, visitorDr.Item("TimeIn").ToString, visitorDr.Item("inStatus").ToString, visitorDr.Item("TimeOut").ToString, visitorDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

        Catch ex As Exception
            MsgBox(ex.Message)
        Finally
            strcon.Close()
        End Try
    End Sub

    Private Sub rad_Month_CheckedChanged(sender As Object, e As EventArgs) Handles rad_Month.CheckedChanged
        DataGridView2.Rows.Clear()
        DataGridView1.Rows.Clear()

        Try
            strcon.Open()

            ' Filter records for the current month for student logs
            Using studentCmd As New MySqlCommand("SELECT tbl_studentlogs.SrCode, CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) AS Fullname, tbl_student.StudentAddress, tbl_student.StudentContactNo, tbl_student.StudentDepartment, tbl_studentlogs.LogDate, tbl_studentlogs.TimeIn, tbl_studentlogs.TimeOut, tbl_studentlogs.inStatus, tbl_studentlogs.outStatus FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode INNER JOIN tb_studinfo ON tb_studinfo.studid = tbl_student.studid WHERE tbl_studentlogs.LogDate like '%" & Date.Now.ToString("MMMM") & "%'", strcon)
                Using studentDr = studentCmd.ExecuteReader
                    While studentDr.Read()
                        DataGridView2.Rows.Add(studentDr.Item("SrCode").ToString, studentDr.Item("Fullname").ToString, studentDr.Item("StudentAddress").ToString, studentDr.Item("StudentContactNo").ToString, studentDr.Item("StudentDepartment").ToString, studentDr.Item("LogDate").ToString, studentDr.Item("TimeIn").ToString, studentDr.Item("inStatus").ToString, studentDr.Item("TimeOut").ToString, studentDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

            ' Filter records for the current month for visitor logs
            Using visitorCmd As New MySqlCommand("SELECT tbl_visitorlogs.VisitorName, tbl_visitor.VisitorAddress, tbl_visitor.VisitorContactNo, tbl_visitor.VisitorSchool, tbl_visitorlogs.LogDate, tbl_visitorlogs.TimeIn, tbl_visitorlogs.TimeOut, tbl_visitorlogs.inStatus, tbl_visitorlogs.outStatus FROM tbl_visitorlogs INNER JOIN tbl_visitor ON tbl_visitorlogs.VisitorName = tbl_visitor.VisitorName WHERE tbl_visitorlogs.LogDate like '%" & Date.Now.ToString("MMMM") & "%'", strcon)
                Using visitorDr = visitorCmd.ExecuteReader
                    While visitorDr.Read()
                        DataGridView1.Rows.Add(visitorDr.Item("VisitorName").ToString, visitorDr.Item("VisitorAddress").ToString, visitorDr.Item("VisitorContactNo").ToString, visitorDr.Item("VisitorSchool").ToString, visitorDr.Item("LogDate").ToString, visitorDr.Item("TimeIn").ToString, visitorDr.Item("inStatus").ToString, visitorDr.Item("TimeOut").ToString, visitorDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

        Catch ex As Exception
            MsgBox(ex.Message)
        Finally
            strcon.Close()
        End Try
    End Sub

    Private Sub btnFilter_Click(sender As Object, e As EventArgs) Handles btnFilter.Click
        Dim date1 As String = DateTimePicker1.Value.ToString("dd-MMMM-yyyy dddd")
        Dim date2 As String = DateTimePicker2.Value.ToString("dd-MMMM-yyyy dddd")

        DataGridView2.Rows.Clear()
        DataGridView1.Rows.Clear()

        Try
            strcon.Open()

            ' Filter records between two dates for student logs
            Using studentCmd As New MySqlCommand("SELECT tbl_studentlogs.SrCode, CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) AS Fullname, tbl_student.StudentAddress, tbl_student.StudentContactNo, tbl_student.StudentDepartment, tbl_studentlogs.LogDate, tbl_studentlogs.TimeIn, tbl_studentlogs.TimeOut, tbl_studentlogs.inStatus, tbl_studentlogs.outStatus FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode INNER JOIN tb_studinfo ON tb_studinfo.studid = tbl_student.studid WHERE tbl_studentlogs.LogDate BETWEEN '" & date1 & "' AND '" & date2 & "'", strcon)
                Using studentDr = studentCmd.ExecuteReader
                    While studentDr.Read()
                        DataGridView2.Rows.Add(studentDr.Item("SrCode").ToString, studentDr.Item("Fullname").ToString, studentDr.Item("StudentAddress").ToString, studentDr.Item("StudentContactNo").ToString, studentDr.Item("StudentDepartment").ToString, studentDr.Item("LogDate").ToString, studentDr.Item("TimeIn").ToString, studentDr.Item("inStatus").ToString, studentDr.Item("TimeOut").ToString, studentDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

            ' Filter records between two dates for visitor logs
            Using visitorCmd As New MySqlCommand("SELECT tbl_visitorlogs.VisitorName, tbl_visitor.VisitorAddress, tbl_visitor.VisitorContactNo, tbl_visitor.VisitorSchool, tbl_visitorlogs.LogDate, tbl_visitorlogs.TimeIn, tbl_visitorlogs.TimeOut, tbl_visitorlogs.inStatus, tbl_visitorlogs.outStatus FROM tbl_visitorlogs INNER JOIN tbl_visitor ON tbl_visitorlogs.VisitorName = tbl_visitor.VisitorName WHERE tbl_visitorlogs.LogDate BETWEEN '" & date1 & "' AND '" & date2 & "'", strcon)
                Using visitorDr = visitorCmd.ExecuteReader
                    While visitorDr.Read()
                        DataGridView1.Rows.Add(visitorDr.Item("VisitorName").ToString, visitorDr.Item("VisitorAddress").ToString, visitorDr.Item("VisitorContactNo").ToString, visitorDr.Item("VisitorSchool").ToString, visitorDr.Item("LogDate").ToString, visitorDr.Item("TimeIn").ToString, visitorDr.Item("inStatus").ToString, visitorDr.Item("TimeOut").ToString, visitorDr.Item("outStatus").ToString)
                    End While
                End Using
            End Using

        Catch ex As Exception
            MsgBox(ex.Message)
        Finally
            strcon.Close()
        End Try
    End Sub

    Private Sub rad_Reset_CheckedChanged(sender As Object, e As EventArgs) Handles rad_Reset.CheckedChanged
        studloadData()
        visitorloadData()
    End Sub
End Class