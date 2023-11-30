<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class loading
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Required by the Windows Form Designer
    Private components As System.ComponentModel.IContainer

    'NOTE: The following procedure is required by the Windows Form Designer
    'It can be modified using the Windows Form Designer.  
    'Do not modify it using the code editor.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        components = New ComponentModel.Container()
        Dim resources As ComponentModel.ComponentResourceManager = New ComponentModel.ComponentResourceManager(GetType(loading))
        ProgressBar1 = New ProgressBar()
        status = New Label()
        progress = New Label()
        Timer1 = New Timer(components)
        Panel1 = New Panel()
        Label4 = New Label()
        PictureBox6 = New PictureBox()
        Label2 = New Label()
        Label7 = New Label()
        Label3 = New Label()
        PictureBox3 = New PictureBox()
        PictureBox2 = New PictureBox()
        Label1 = New Label()
        Labelnames = New Label()
        PictureBox1 = New PictureBox()
        Panel1.SuspendLayout()
        CType(PictureBox6, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).BeginInit()
        SuspendLayout()
        ' 
        ' ProgressBar1
        ' 
        ProgressBar1.BackColor = SystemColors.ControlLightLight
        ProgressBar1.ForeColor = Color.LimeGreen
        ProgressBar1.Location = New Point(35, 156)
        ProgressBar1.Name = "ProgressBar1"
        ProgressBar1.Size = New Size(547, 23)
        ProgressBar1.TabIndex = 0
        ' 
        ' status
        ' 
        status.AutoSize = True
        status.BackColor = Color.Transparent
        status.Font = New Font("Microsoft Sans Serif", 12.75F, FontStyle.Regular, GraphicsUnit.Point)
        status.ForeColor = Color.White
        status.Location = New Point(35, 182)
        status.Name = "status"
        status.Size = New Size(223, 20)
        status.TabIndex = 1
        status.Tag = "Launching the application......"
        status.Text = "Launching the application......"
        ' 
        ' progress
        ' 
        progress.AutoSize = True
        progress.BackColor = Color.Transparent
        progress.Font = New Font("Microsoft Sans Serif", 12.75F, FontStyle.Regular, GraphicsUnit.Point)
        progress.ForeColor = Color.White
        progress.Location = New Point(539, 182)
        progress.Name = "progress"
        progress.Size = New Size(51, 20)
        progress.TabIndex = 2
        progress.Tag = "Launching the application......"
        progress.Text = "000%"
        ' 
        ' Timer1
        ' 
        Timer1.Enabled = True
        Timer1.Interval = 101
        ' 
        ' Panel1
        ' 
        Panel1.BackgroundImage = My.Resources.Resources._395414666_6196295990470090_3974335045363994889_n
        Panel1.BackgroundImageLayout = ImageLayout.Stretch
        Panel1.Controls.Add(Label4)
        Panel1.Controls.Add(PictureBox6)
        Panel1.Controls.Add(Label2)
        Panel1.Controls.Add(Label7)
        Panel1.Controls.Add(Label3)
        Panel1.Controls.Add(PictureBox3)
        Panel1.Controls.Add(PictureBox2)
        Panel1.Controls.Add(Label1)
        Panel1.Controls.Add(Labelnames)
        Panel1.Controls.Add(ProgressBar1)
        Panel1.Controls.Add(progress)
        Panel1.Controls.Add(status)
        Panel1.Location = New Point(-2, -1)
        Panel1.Name = "Panel1"
        Panel1.Size = New Size(622, 470)
        Panel1.TabIndex = 3
        ' 
        ' Label4
        ' 
        Label4.AutoSize = True
        Label4.BackColor = Color.Transparent
        Label4.Font = New Font("Microsoft Sans Serif", 9F, FontStyle.Italic, GraphicsUnit.Point)
        Label4.ForeColor = Color.White
        Label4.Location = New Point(21, 236)
        Label4.Name = "Label4"
        Label4.Size = New Size(577, 15)
        Label4.TabIndex = 38
        Label4.Tag = "Launching the application......"
        Label4.Text = "Kim Paolo Cuenca @ Patrick Jacob Latade @ L-son Silang @ Jelo Hernandez @ Dexter James Valencia"
        ' 
        ' PictureBox6
        ' 
        PictureBox6.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        PictureBox6.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox6.Location = New Point(479, 15)
        PictureBox6.Name = "PictureBox6"
        PictureBox6.Size = New Size(58, 49)
        PictureBox6.TabIndex = 37
        PictureBox6.TabStop = False
        ' 
        ' Label2
        ' 
        Label2.AutoSize = True
        Label2.BackColor = Color.Transparent
        Label2.Font = New Font("Book Antiqua", 12F, FontStyle.Bold, GraphicsUnit.Point)
        Label2.ForeColor = Color.White
        Label2.ImeMode = ImeMode.NoControl
        Label2.Location = New Point(169, 43)
        Label2.Name = "Label2"
        Label2.Size = New Size(280, 21)
        Label2.TabIndex = 36
        Label2.Text = "The National Engeeniring University"
        ' 
        ' Label7
        ' 
        Label7.AutoSize = True
        Label7.BackColor = Color.Transparent
        Label7.Font = New Font("Book Antiqua", 14.25F, FontStyle.Bold, GraphicsUnit.Point)
        Label7.ForeColor = Color.White
        Label7.ImeMode = ImeMode.NoControl
        Label7.Location = New Point(21, 78)
        Label7.Name = "Label7"
        Label7.Size = New Size(569, 23)
        Label7.TabIndex = 35
        Label7.Text = "Leading Innovations, Transforming Lives, Building the Nation "
        ' 
        ' Label3
        ' 
        Label3.AutoSize = True
        Label3.BackColor = Color.Transparent
        Label3.Font = New Font("Book Antiqua", 20.25F, FontStyle.Bold, GraphicsUnit.Point)
        Label3.ForeColor = Color.White
        Label3.Location = New Point(142, 10)
        Label3.Name = "Label3"
        Label3.Size = New Size(336, 32)
        Label3.TabIndex = 34
        Label3.Text = "Batangas State University"
        ' 
        ' PictureBox3
        ' 
        PictureBox3.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        PictureBox3.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox3.Location = New Point(81, 15)
        PictureBox3.Name = "PictureBox3"
        PictureBox3.Size = New Size(58, 49)
        PictureBox3.TabIndex = 33
        PictureBox3.TabStop = False
        ' 
        ' PictureBox2
        ' 
        PictureBox2.BackColor = Color.Transparent
        PictureBox2.BackgroundImage = My.Resources.Resources.icons8_copyright_32
        PictureBox2.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox2.Location = New Point(184, 450)
        PictureBox2.Name = "PictureBox2"
        PictureBox2.Size = New Size(23, 16)
        PictureBox2.TabIndex = 5
        PictureBox2.TabStop = False
        ' 
        ' Label1
        ' 
        Label1.AutoSize = True
        Label1.BackColor = Color.Transparent
        Label1.Font = New Font("Microsoft Sans Serif", 9.75F, FontStyle.Regular, GraphicsUnit.Point)
        Label1.ForeColor = Color.White
        Label1.Location = New Point(204, 450)
        Label1.Name = "Label1"
        Label1.Size = New Size(211, 16)
        Label1.TabIndex = 4
        Label1.Tag = "Launching the application......"
        Label1.Text = "2023 System. All Rights Reserved."
        ' 
        ' Labelnames
        ' 
        Labelnames.AutoSize = True
        Labelnames.BackColor = Color.Transparent
        Labelnames.Font = New Font("Microsoft Sans Serif", 9.75F, FontStyle.Regular, GraphicsUnit.Point)
        Labelnames.ForeColor = Color.White
        Labelnames.Location = New Point(39, 282)
        Labelnames.Name = "Labelnames"
        Labelnames.Size = New Size(543, 160)
        Labelnames.TabIndex = 3
        Labelnames.Tag = "Launching the application......"
        Labelnames.Text = resources.GetString("Labelnames.Text")
        Labelnames.TextAlign = ContentAlignment.TopCenter
        ' 
        ' PictureBox1
        ' 
        PictureBox1.BackColor = Color.Transparent
        PictureBox1.BackgroundImage = My.Resources.Resources.visitor__1_
        PictureBox1.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox1.Location = New Point(619, -1)
        PictureBox1.Name = "PictureBox1"
        PictureBox1.Size = New Size(385, 470)
        PictureBox1.TabIndex = 4
        PictureBox1.TabStop = False
        ' 
        ' loading
        ' 
        AutoScaleDimensions = New SizeF(7F, 15F)
        AutoScaleMode = AutoScaleMode.Font
        BackgroundImageLayout = ImageLayout.Stretch
        ClientSize = New Size(1001, 468)
        Controls.Add(PictureBox1)
        Controls.Add(Panel1)
        DoubleBuffered = True
        FormBorderStyle = FormBorderStyle.None
        Name = "loading"
        Text = "Form1"
        Panel1.ResumeLayout(False)
        Panel1.PerformLayout()
        CType(PictureBox6, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).EndInit()
        ResumeLayout(False)
    End Sub

    Friend WithEvents ProgressBar1 As ProgressBar
    Friend WithEvents status As Label
    Friend WithEvents progress As Label
    Friend WithEvents Timer1 As Timer
    Friend WithEvents Panel1 As Panel
    Friend WithEvents PictureBox1 As PictureBox
    Friend WithEvents Labelnames As Label
    Friend WithEvents Label1 As Label
    Friend WithEvents PictureBox2 As PictureBox
    Friend WithEvents PictureBox6 As PictureBox
    Friend WithEvents Label2 As Label
    Friend WithEvents Label7 As Label
    Friend WithEvents Label3 As Label
    Friend WithEvents PictureBox3 As PictureBox
    Friend WithEvents Label4 As Label
End Class
