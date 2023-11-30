Module FormCenter

    Public Sub CenterForm(form As Form)
        form.StartPosition = FormStartPosition.Manual
        Dim screen As Screen = Screen.FromPoint(form.Location)
        Dim screenBounds As Rectangle = screen.Bounds
        Dim x As Integer = (screenBounds.Width - form.Width) \ 2
        Dim y As Integer = (screenBounds.Height - form.Height) \ 2
        form.Location = New Point(x, y)
    End Sub

End Module

