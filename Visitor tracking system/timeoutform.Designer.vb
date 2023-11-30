<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()>
Partial Class timeoutform
    Inherits System.Windows.Forms.Form

    'Form overrides dispose to clean up the component list.
    <System.Diagnostics.DebuggerNonUserCode()>
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
    <System.Diagnostics.DebuggerStepThrough()>
    Private Sub InitializeComponent()
        Dim DataGridViewCellStyle1 As DataGridViewCellStyle = New DataGridViewCellStyle()
        searchTxtbx = New TextBox()
        DataGridView1 = New DataGridView()
        Label1 = New Label()
        Panel1 = New Panel()
        timeoutbtnPb = New PictureBox()
        PictureBox4 = New PictureBox()
        Label7 = New Label()
        Label2 = New Label()
        Label3 = New Label()
        PictureBox2 = New PictureBox()
        PictureBox3 = New PictureBox()
        CType(DataGridView1, ComponentModel.ISupportInitialize).BeginInit()
        Panel1.SuspendLayout()
        CType(timeoutbtnPb, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox4, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).BeginInit()
        SuspendLayout()
        ' 
        ' searchTxtbx
        ' 
        searchTxtbx.Location = New Point(197, 84)
        searchTxtbx.Name = "searchTxtbx"
        searchTxtbx.Size = New Size(329, 23)
        searchTxtbx.TabIndex = 21
        ' 
        ' DataGridView1
        ' 
        DataGridView1.AllowUserToAddRows = False
        DataGridView1.AllowUserToDeleteRows = False
        DataGridViewCellStyle1.BackColor = Color.FromArgb(CByte(255), CByte(128), CByte(128))
        DataGridView1.AlternatingRowsDefaultCellStyle = DataGridViewCellStyle1
        DataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill
        DataGridView1.BackgroundColor = Color.White
        DataGridView1.ColumnHeadersHeightSizeMode = DataGridViewColumnHeadersHeightSizeMode.AutoSize
        DataGridView1.Location = New Point(56, 118)
        DataGridView1.Name = "DataGridView1"
        DataGridView1.ReadOnly = True
        DataGridView1.RowTemplate.Height = 25
        DataGridView1.ScrollBars = ScrollBars.None
        DataGridView1.Size = New Size(618, 243)
        DataGridView1.TabIndex = 23
        ' 
        ' Label1
        ' 
        Label1.AutoSize = True
        Label1.BackColor = Color.Transparent
        Label1.Font = New Font("Bell MT", 14.25F, FontStyle.Bold, GraphicsUnit.Point)
        Label1.Location = New Point(229, 57)
        Label1.Name = "Label1"
        Label1.Size = New Size(268, 24)
        Label1.TabIndex = 24
        Label1.Text = "Enter your visitor number here"
        ' 
        ' Panel1
        ' 
        Panel1.Controls.Add(timeoutbtnPb)
        Panel1.Controls.Add(DataGridView1)
        Panel1.Controls.Add(Label1)
        Panel1.Controls.Add(searchTxtbx)
        Panel1.Location = New Point(83, 134)
        Panel1.Name = "Panel1"
        Panel1.Size = New Size(729, 428)
        Panel1.TabIndex = 25
        ' 
        ' timeoutbtnPb
        ' 
        timeoutbtnPb.BackColor = Color.Transparent
        timeoutbtnPb.BackgroundImage = My.Resources.Resources.Screenshot__52__removebg_preview1
        timeoutbtnPb.BackgroundImageLayout = ImageLayout.Stretch
        timeoutbtnPb.ImeMode = ImeMode.NoControl
        timeoutbtnPb.Location = New Point(308, 374)
        timeoutbtnPb.Name = "timeoutbtnPb"
        timeoutbtnPb.Size = New Size(114, 46)
        timeoutbtnPb.TabIndex = 34
        timeoutbtnPb.TabStop = False
        ' 
        ' PictureBox4
        ' 
        PictureBox4.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        PictureBox4.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox4.ImeMode = ImeMode.NoControl
        PictureBox4.Location = New Point(614, 0)
        PictureBox4.Name = "PictureBox4"
        PictureBox4.Size = New Size(62, 56)
        PictureBox4.TabIndex = 30
        PictureBox4.TabStop = False
        ' 
        ' Label7
        ' 
        Label7.AutoSize = True
        Label7.BackColor = Color.Transparent
        Label7.Font = New Font("Book Antiqua", 12F, FontStyle.Bold, GraphicsUnit.Point)
        Label7.ForeColor = Color.White
        Label7.ImeMode = ImeMode.NoControl
        Label7.Location = New Point(292, 35)
        Label7.Name = "Label7"
        Label7.Size = New Size(280, 21)
        Label7.TabIndex = 29
        Label7.Text = "The National Engineering University"
        ' 
        ' Label2
        ' 
        Label2.AutoSize = True
        Label2.BackColor = Color.Transparent
        Label2.Font = New Font("Book Antiqua", 20.25F, FontStyle.Bold, GraphicsUnit.Point)
        Label2.ForeColor = Color.White
        Label2.ImeMode = ImeMode.NoControl
        Label2.Location = New Point(272, 3)
        Label2.Name = "Label2"
        Label2.Size = New Size(336, 32)
        Label2.TabIndex = 28
        Label2.Text = "Batangas State University"
        ' 
        ' Label3
        ' 
        Label3.AutoSize = True
        Label3.BackColor = Color.Transparent
        Label3.Font = New Font("Book Antiqua", 18F, FontStyle.Bold, GraphicsUnit.Point)
        Label3.ForeColor = Color.White
        Label3.ImeMode = ImeMode.NoControl
        Label3.Location = New Point(104, 75)
        Label3.Name = "Label3"
        Label3.Size = New Size(707, 28)
        Label3.TabIndex = 27
        Label3.Text = "Leading Innovations, Transforming Lives, Building the Nation "
        ' 
        ' PictureBox2
        ' 
        PictureBox2.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        PictureBox2.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox2.ImeMode = ImeMode.NoControl
        PictureBox2.Location = New Point(204, 0)
        PictureBox2.Name = "PictureBox2"
        PictureBox2.Size = New Size(62, 56)
        PictureBox2.TabIndex = 26
        PictureBox2.TabStop = False
        ' 
        ' PictureBox3
        ' 
        PictureBox3.BackColor = Color.Transparent
        PictureBox3.BackgroundImage = My.Resources.Resources.visitor__1__removebg_preview
        PictureBox3.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox3.ImeMode = ImeMode.NoControl
        PictureBox3.Location = New Point(840, 547)
        PictureBox3.Name = "PictureBox3"
        PictureBox3.Size = New Size(57, 50)
        PictureBox3.SizeMode = PictureBoxSizeMode.StretchImage
        PictureBox3.TabIndex = 32
        PictureBox3.TabStop = False
        ' 
        ' timeoutform
        ' 
        AutoScaleDimensions = New SizeF(7F, 15F)
        AutoScaleMode = AutoScaleMode.Font
        BackgroundImage = My.Resources.Resources._395414666_6196295990470090_3974335045363994889_n
        BackgroundImageLayout = ImageLayout.Stretch
        ClientSize = New Size(895, 599)
        Controls.Add(PictureBox3)
        Controls.Add(PictureBox4)
        Controls.Add(Label7)
        Controls.Add(Label2)
        Controls.Add(Label3)
        Controls.Add(PictureBox2)
        Controls.Add(Panel1)
        DoubleBuffered = True
        FormBorderStyle = FormBorderStyle.None
        Name = "timeoutform"
        Text = "Time-Out"
        CType(DataGridView1, ComponentModel.ISupportInitialize).EndInit()
        Panel1.ResumeLayout(False)
        Panel1.PerformLayout()
        CType(timeoutbtnPb, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox4, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).EndInit()
        ResumeLayout(False)
        PerformLayout()
    End Sub
    Friend WithEvents searchTxtbx As TextBox
    Friend WithEvents Label1 As Label
    Friend WithEvents DataGridView1 As DataGridView
    Friend WithEvents PictureBox4 As PictureBox
    Friend WithEvents Label7 As Label
    Friend WithEvents Label2 As Label
    Friend WithEvents Panel1 As Panel
    Friend WithEvents timeoutbtnPb As PictureBox
    Friend WithEvents Label3 As Label
    Friend WithEvents PictureBox2 As PictureBox
    Friend WithEvents PictureBox3 As PictureBox
End Class
