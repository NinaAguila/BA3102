Module FormDrag
    Private dragging As Boolean
    Private dragCursor As Point
    Private dragForm As Point

    Public Sub EnableFormDragging(form As Form)
        AddHandler form.MouseDown, AddressOf Form_MouseDown
        AddHandler form.MouseMove, AddressOf Form_MouseMove
        AddHandler form.MouseUp, AddressOf Form_MouseUp
    End Sub

    Private Sub Form_MouseDown(sender As Object, e As MouseEventArgs)
        dragging = True
        dragCursor = Cursor.Position
        dragForm = CType(sender, Form).Location
    End Sub

    Private Sub Form_MouseMove(sender As Object, e As MouseEventArgs)
        If dragging Then
            Dim diff As Point = Point.Subtract(Cursor.Position, New Size(dragCursor))
            CType(sender, Form).Location = Point.Add(dragForm, New Size(diff))
        End If
    End Sub

    Private Sub Form_MouseUp(sender As Object, e As MouseEventArgs)
        dragging = False
    End Sub

End Module
