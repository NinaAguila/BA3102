Imports System.Drawing.Drawing2D
Imports MySql.Data.MySqlClient
Imports Mysqlx.XDevAPI.Relational

Public Class Menu
    Private Sub Menu_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        FormCenter.CenterForm(Me)
        FormDrag.EnableFormDragging(Me)
    End Sub

    Private Sub Panel1_Paint(sender As Object, e As PaintEventArgs) Handles Panel1.Paint
        Dim gradBrush As New LinearGradientBrush(Me.ClientRectangle, Color.Red, Color.White, LinearGradientMode.BackwardDiagonal)
        e.Graphics.FillRectangle(gradBrush, Me.ClientRectangle)
    End Sub

    Private Sub visitorbtnPb_Click(sender As Object, e As EventArgs) Handles visitorbtnPb.Click
        Me.Hide()
        userform.Show()
        timeoutbtnPb.Enabled = False
    End Sub

    Private Sub timeoutbtnPb_Click(sender As Object, e As EventArgs) Handles timeoutbtnPb.Click
        Me.Hide()
        timeoutform.Show()
        visitorbtnPb.Enabled = False
    End Sub
End Class