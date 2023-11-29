Imports MySql.Data.MySqlClient

Public Class MainDashboard
    Private WithEvents refreshTimer As New Timer()

    Private Sub btnAccess_Click(sender As Object, e As EventArgs) Handles btnAccess.Click
        Me.Hide()
        StudentVistorAccess.Show()
    End Sub

    Private Sub btnVisitorRegistration_Click(sender As Object, e As EventArgs) Handles btnVisitorRegistration.Click
        Me.Hide()
        VisitorRegistration.Show()
    End Sub

    Private Sub btnReports_Click(sender As Object, e As EventArgs) Handles btnReports.Click
        Me.Hide()
        Reports.Show()
    End Sub

    Private Sub btnExit_Click(sender As Object, e As EventArgs) Handles btnExit.Click
        End
    End Sub

    Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
        lbl_time.Text = Date.Now.ToString("hh:mm:ss tt")
        lbl_date.Text = Date.Now.ToString("dd-MMMM-yyyy dddd")
        Load_NoOfStudentsDept()
        Load_NoOfVisitors()
    End Sub

    Private Sub MainDashboard_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        ' Set the timer interval to refresh every 60 seconds (adjust as needed)
        refreshTimer.Interval = 60000
        refreshTimer.Start()

        ' Initial load
        Load_NoOfStudentsDept()
        Load_NoOfVisitors()
    End Sub

    Sub Load_NoOfStudentsDept()
        Try
            Using strcon As MySqlConnection = New MySqlConnection("server=localhost;user id=root;database=db_ba3102")
                strcon.Open()
                Dim cmd As MySqlCommand = New MySqlCommand("Select COUNT(tbl_studentlogs.SrCode) FROM tbl_studentlogs INNER JOIN tbl_student On tbl_studentlogs.SrCode = tbl_student.SrCode WHERE tbl_student.StudentDepartment = 'CICS' AND tbl_studentlogs.LogDate ='" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "'", strcon)
                lbl_CICS.Text = cmd.ExecuteScalar.ToString + " students"
                cmd = New MySqlCommand("SELECT COUNT(tbl_studentlogs.SrCode) FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode WHERE tbl_student.StudentDepartment = 'CTE' AND tbl_studentlogs.LogDate ='" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "'", strcon)
                lbl_CTE.Text = cmd.ExecuteScalar.ToString + " students"
                cmd = New MySqlCommand("SELECT COUNT(tbl_studentlogs.SrCode) FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode WHERE tbl_student.StudentDepartment = 'CIT' AND tbl_studentlogs.LogDate ='" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "'", strcon)
                lbl_CIT.Text = cmd.ExecuteScalar.ToString + " students"
                cmd = New MySqlCommand("SELECT COUNT(tbl_studentlogs.SrCode) FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode WHERE tbl_student.StudentDepartment = 'CAS' AND tbl_studentlogs.LogDate ='" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "'", strcon)
                lbl_CAS.Text = cmd.ExecuteScalar.ToString + " students"
                cmd = New MySqlCommand("SELECT COUNT(tbl_studentlogs.SrCode) FROM tbl_studentlogs INNER JOIN tbl_student ON tbl_studentlogs.SrCode = tbl_student.SrCode WHERE tbl_student.StudentDepartment = 'CABE' AND tbl_studentlogs.LogDate ='" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "'", strcon)
                lbl_CABE.Text = cmd.ExecuteScalar.ToString + " students"

            End Using ' Automatically closes the connection when leaving the block
        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
    End Sub

    Sub Load_NoOfVisitors()
        Try
            Using strcon As MySqlConnection = New MySqlConnection("server=localhost;user id=root;database=db_ba3102")
                strcon.Open()
                Dim cmd As MySqlCommand = New MySqlCommand("Select COUNT(tbl_visitorlogs.VisitorName) FROM tbl_visitorlogs INNER JOIN tbl_visitor On tbl_visitorlogs.VisitorName = tbl_visitor.VisitorName WHERE tbl_visitorlogs.LogDate ='" & Date.Now.ToString("dd-MMMM-yyyy dddd") & "'", strcon)
                lbl_Visitor.Text = cmd.ExecuteScalar.ToString + " visitors"
            End Using ' Automatically closes the connection when leaving the block
        Catch ex As Exception
            MsgBox(ex.Message)
        End Try
    End Sub

End Class