Imports MySql.Data.MySqlClient
Public Class adminLoading
    Private dragging As Boolean
    Private dragCursor As Point
    Private dragForm As Point

    Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
        progress.Text = ProgressBar1.Value & "%"


        ProgressBar1.Value = Math.Min(ProgressBar1.Value + 1, 100)

        If ProgressBar1.Value > 10 Then
            status.Text = "Loading... Please wait"
        End If

        If ProgressBar1.Value > 35 Then
            status.Text = "Connecting to the database..."
        End If

        If ProgressBar1.Value > 65 Then
            status.Text = "Please wait..."
        End If

        If ProgressBar1.Value > 75 Then
            status.Text = "Fetching......"
        End If

        If ProgressBar1.Value > 85 Then
            status.Text = "Almost there..."
        End If

        If ProgressBar1.Value = 100 Then
            status.Text = "Launching Application..."
            Me.Hide()
            Timer1.Dispose()
            Dim con As New MySqlConnection("server=localhost;username=root;password=;database=db_ba3102")
            Try
                con.Open()
                cmd.Connection = con
                MessageBox.Show("Connected to the Database.", "Connected", MessageBoxButtons.OK, MessageBoxIcon.Information)
                login.Show()
                con.Close()
            Catch ex As Exception
                MessageBox.Show("Cannot Connect to the Database.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
                Environment.Exit(0)
            End Try
        End If
    End Sub

    Private Sub Panel1_MouseDown(sender As Object, e As MouseEventArgs) Handles Panel1.MouseDown
        dragging = True
        dragCursor = Cursor.Position
        dragForm = Me.Location
    End Sub

    Private Sub Panel1_MouseMove(sender As Object, e As MouseEventArgs) Handles Panel1.MouseMove
        If dragging Then
            Dim diff As Point = Point.Subtract(Cursor.Position, New Size(dragCursor))
            Me.Location = Point.Add(dragForm, New Size(diff))
        End If
    End Sub

    Private Sub Panel1_MouseUp(sender As Object, e As MouseEventArgs) Handles Panel1.MouseUp
        dragging = False
    End Sub

    Private Sub PictureBox1_MouseDown(sender As Object, e As MouseEventArgs) Handles PictureBox1.MouseDown
        dragging = True
        dragCursor = Cursor.Position
        dragForm = Me.Location
    End Sub

    Private Sub PictureBox1_MouseMove(sender As Object, e As MouseEventArgs) Handles PictureBox1.MouseMove
        If dragging Then
            Dim diff As Point = Point.Subtract(Cursor.Position, New Size(dragCursor))
            Me.Location = Point.Add(dragForm, New Size(diff))
        End If
    End Sub

    Private Sub PictureBox1_MouseUp(sender As Object, e As MouseEventArgs) Handles PictureBox1.MouseUp
        dragging = False
    End Sub

    Private Sub loading_Load(sender As Object, e As EventArgs)
        FormCenter.CenterForm(Me)
    End Sub

End Class