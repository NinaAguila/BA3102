Public Class SplashScreen
    Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
        ProgressBar1.Visible = True
        ProgressBar1.Value = ProgressBar1.Value + 2
        If (ProgressBar1.Value = 10) Then
            Label1.Text = "10%"
        ElseIf (ProgressBar1.Value = 20) Then
            Label1.Text = "20%"
        ElseIf (ProgressBar1.Value = 40) Then
            Label1.Text = "40%"
        ElseIf (ProgressBar1.Value = 60) Then
            Label1.Text = "60%"
        ElseIf (ProgressBar1.Value = 80) Then
            Label1.Text = "80%"
        ElseIf (ProgressBar1.Value = 100) Then
            LoginForm.Show()
            Timer1.Enabled = False
            Me.Hide()
        End If
    End Sub
End Class
