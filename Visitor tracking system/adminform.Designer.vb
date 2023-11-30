<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class adminform
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
        Dim DataGridViewCellStyle1 As DataGridViewCellStyle = New DataGridViewCellStyle()
        Dim DataGridViewCellStyle2 As DataGridViewCellStyle = New DataGridViewCellStyle()
        viewreportbtn = New Button()
        Label6 = New Label()
        createbtn = New Button()
        Panel1 = New Panel()
        uname = New Label()
        PictureBox6 = New PictureBox()
        PictureBox4 = New PictureBox()
        Button1 = New Button()
        PictureBox3 = New PictureBox()
        PictureBox2 = New PictureBox()
        logoutbtn = New Button()
        adname = New Label()
        PictureBox1 = New PictureBox()
        Label3 = New Label()
        AdsearchTxtbx = New TextBox()
        Label8 = New Label()
        DataGridView1 = New DataGridView()
        Label4 = New Label()
        visitorID_pboxad = New PictureBox()
        visitor_pboxad = New PictureBox()
        Label7 = New Label()
        Label5 = New Label()
        d1 = New DateTimePicker()
        Label1 = New Label()
        PictureBox7 = New PictureBox()
        Label2 = New Label()
        reloadBtnPb = New PictureBox()
        Panel1.SuspendLayout()
        CType(PictureBox6, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox4, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).BeginInit()
        CType(DataGridView1, ComponentModel.ISupportInitialize).BeginInit()
        CType(visitorID_pboxad, ComponentModel.ISupportInitialize).BeginInit()
        CType(visitor_pboxad, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox7, ComponentModel.ISupportInitialize).BeginInit()
        CType(reloadBtnPb, ComponentModel.ISupportInitialize).BeginInit()
        SuspendLayout()
        ' 
        ' viewreportbtn
        ' 
        viewreportbtn.BackColor = SystemColors.ControlLightLight
        viewreportbtn.Font = New Font("Segoe UI Semibold", 11.25F, FontStyle.Bold, GraphicsUnit.Point)
        viewreportbtn.Location = New Point(-2, 298)
        viewreportbtn.Name = "viewreportbtn"
        viewreportbtn.Size = New Size(213, 53)
        viewreportbtn.TabIndex = 4
        viewreportbtn.Text = "View Report"
        viewreportbtn.UseVisualStyleBackColor = False
        ' 
        ' Label6
        ' 
        Label6.AutoSize = True
        Label6.BackColor = Color.Transparent
        Label6.Location = New Point(-193, 21)
        Label6.Name = "Label6"
        Label6.Size = New Size(0, 15)
        Label6.TabIndex = 30
        ' 
        ' createbtn
        ' 
        createbtn.BackColor = SystemColors.ControlLightLight
        createbtn.Font = New Font("Segoe UI Semibold", 11.25F, FontStyle.Bold, GraphicsUnit.Point)
        createbtn.Location = New Point(-2, 390)
        createbtn.Name = "createbtn"
        createbtn.Size = New Size(213, 53)
        createbtn.TabIndex = 32
        createbtn.Text = "Create an Account"
        createbtn.UseVisualStyleBackColor = False
        ' 
        ' Panel1
        ' 
        Panel1.BackColor = Color.White
        Panel1.BorderStyle = BorderStyle.Fixed3D
        Panel1.Controls.Add(uname)
        Panel1.Controls.Add(PictureBox6)
        Panel1.Controls.Add(PictureBox4)
        Panel1.Controls.Add(Button1)
        Panel1.Controls.Add(PictureBox3)
        Panel1.Controls.Add(PictureBox2)
        Panel1.Controls.Add(logoutbtn)
        Panel1.Controls.Add(adname)
        Panel1.Controls.Add(createbtn)
        Panel1.Controls.Add(PictureBox1)
        Panel1.Controls.Add(viewreportbtn)
        Panel1.Location = New Point(0, 0)
        Panel1.Name = "Panel1"
        Panel1.Size = New Size(213, 760)
        Panel1.TabIndex = 33
        ' 
        ' uname
        ' 
        uname.AutoSize = True
        uname.BackColor = Color.Transparent
        uname.Font = New Font("Segoe UI Semibold", 11.25F, FontStyle.Bold, GraphicsUnit.Point)
        uname.Location = New Point(38, 46)
        uname.Name = "uname"
        uname.Size = New Size(96, 20)
        uname.TabIndex = 44
        uname.Text = "uname(hide)"
        uname.Visible = False
        ' 
        ' PictureBox6
        ' 
        PictureBox6.BackColor = Color.White
        PictureBox6.BackgroundImage = My.Resources.Resources.printer
        PictureBox6.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox6.ImeMode = ImeMode.NoControl
        PictureBox6.Location = New Point(7, 596)
        PictureBox6.Name = "PictureBox6"
        PictureBox6.Size = New Size(30, 38)
        PictureBox6.SizeMode = PictureBoxSizeMode.StretchImage
        PictureBox6.TabIndex = 43
        PictureBox6.TabStop = False
        ' 
        ' PictureBox4
        ' 
        PictureBox4.BackColor = Color.White
        PictureBox4.BackgroundImage = My.Resources.Resources.add_user
        PictureBox4.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox4.ImeMode = ImeMode.NoControl
        PictureBox4.Location = New Point(4, 397)
        PictureBox4.Name = "PictureBox4"
        PictureBox4.Size = New Size(33, 38)
        PictureBox4.SizeMode = PictureBoxSizeMode.StretchImage
        PictureBox4.TabIndex = 40
        PictureBox4.TabStop = False
        ' 
        ' Button1
        ' 
        Button1.BackColor = SystemColors.ControlLightLight
        Button1.Font = New Font("Segoe UI Semibold", 11.25F, FontStyle.Bold, GraphicsUnit.Point)
        Button1.Location = New Point(-4, 589)
        Button1.Name = "Button1"
        Button1.Size = New Size(215, 53)
        Button1.TabIndex = 42
        Button1.Text = "Print Report Summary"
        Button1.TextAlign = ContentAlignment.MiddleRight
        Button1.UseVisualStyleBackColor = False
        ' 
        ' PictureBox3
        ' 
        PictureBox3.BackColor = Color.White
        PictureBox3.BackgroundImage = My.Resources.Resources.turn_off
        PictureBox3.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox3.ImeMode = ImeMode.NoControl
        PictureBox3.Location = New Point(7, 494)
        PictureBox3.Name = "PictureBox3"
        PictureBox3.Size = New Size(30, 38)
        PictureBox3.SizeMode = PictureBoxSizeMode.StretchImage
        PictureBox3.TabIndex = 39
        PictureBox3.TabStop = False
        ' 
        ' PictureBox2
        ' 
        PictureBox2.BackColor = Color.White
        PictureBox2.BackgroundImage = My.Resources.Resources.report__1_
        PictureBox2.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox2.ImeMode = ImeMode.NoControl
        PictureBox2.Location = New Point(10, 307)
        PictureBox2.Name = "PictureBox2"
        PictureBox2.Size = New Size(38, 38)
        PictureBox2.SizeMode = PictureBoxSizeMode.StretchImage
        PictureBox2.TabIndex = 38
        PictureBox2.TabStop = False
        ' 
        ' logoutbtn
        ' 
        logoutbtn.BackColor = SystemColors.ControlLightLight
        logoutbtn.Font = New Font("Segoe UI Semibold", 11.25F, FontStyle.Bold, GraphicsUnit.Point)
        logoutbtn.Location = New Point(-4, 487)
        logoutbtn.Name = "logoutbtn"
        logoutbtn.Size = New Size(215, 53)
        logoutbtn.TabIndex = 37
        logoutbtn.Text = "Logout"
        logoutbtn.UseVisualStyleBackColor = False
        ' 
        ' adname
        ' 
        adname.AutoSize = True
        adname.BackColor = Color.Transparent
        adname.Font = New Font("Segoe UI Semibold", 11.25F, FontStyle.Bold, GraphicsUnit.Point)
        adname.Location = New Point(38, 7)
        adname.Name = "adname"
        adname.Size = New Size(69, 20)
        adname.TabIndex = 35
        adname.Text = "AdName"
        ' 
        ' PictureBox1
        ' 
        PictureBox1.BackColor = Color.Transparent
        PictureBox1.BackgroundImage = My.Resources.Resources.user_account
        PictureBox1.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox1.ImeMode = ImeMode.NoControl
        PictureBox1.Location = New Point(35, 101)
        PictureBox1.Name = "PictureBox1"
        PictureBox1.Size = New Size(147, 138)
        PictureBox1.SizeMode = PictureBoxSizeMode.StretchImage
        PictureBox1.TabIndex = 36
        PictureBox1.TabStop = False
        ' 
        ' Label3
        ' 
        Label3.AutoSize = True
        Label3.BackColor = Color.Transparent
        Label3.Font = New Font("Myanmar Text", 12F, FontStyle.Bold, GraphicsUnit.Point)
        Label3.ForeColor = Color.White
        Label3.ImeMode = ImeMode.NoControl
        Label3.Location = New Point(1141, 288)
        Label3.Name = "Label3"
        Label3.Size = New Size(96, 29)
        Label3.TabIndex = 18
        Label3.Text = "Visitor's ID"
        ' 
        ' AdsearchTxtbx
        ' 
        AdsearchTxtbx.BorderStyle = BorderStyle.FixedSingle
        AdsearchTxtbx.Location = New Point(908, 71)
        AdsearchTxtbx.Name = "AdsearchTxtbx"
        AdsearchTxtbx.Size = New Size(329, 23)
        AdsearchTxtbx.TabIndex = 25
        AdsearchTxtbx.TextAlign = HorizontalAlignment.Center
        ' 
        ' Label8
        ' 
        Label8.AutoSize = True
        Label8.BackColor = Color.Transparent
        Label8.Font = New Font("Myanmar Text", 12F, FontStyle.Bold, GraphicsUnit.Point)
        Label8.ForeColor = Color.White
        Label8.ImeMode = ImeMode.NoControl
        Label8.Location = New Point(890, 288)
        Label8.Name = "Label8"
        Label8.Size = New Size(125, 29)
        Label8.TabIndex = 17
        Label8.Text = "Visitor's Photo"
        ' 
        ' DataGridView1
        ' 
        DataGridViewCellStyle1.BackColor = Color.FromArgb(CByte(255), CByte(128), CByte(128))
        DataGridView1.AlternatingRowsDefaultCellStyle = DataGridViewCellStyle1
        DataGridView1.AutoSizeColumnsMode = DataGridViewAutoSizeColumnsMode.Fill
        DataGridView1.BackgroundColor = Color.White
        DataGridViewCellStyle2.Alignment = DataGridViewContentAlignment.MiddleLeft
        DataGridViewCellStyle2.BackColor = Color.OrangeRed
        DataGridViewCellStyle2.Font = New Font("Segoe UI", 9F, FontStyle.Regular, GraphicsUnit.Point)
        DataGridViewCellStyle2.ForeColor = SystemColors.WindowText
        DataGridViewCellStyle2.SelectionBackColor = Color.OrangeRed
        DataGridViewCellStyle2.SelectionForeColor = SystemColors.HighlightText
        DataGridViewCellStyle2.WrapMode = DataGridViewTriState.True
        DataGridView1.ColumnHeadersDefaultCellStyle = DataGridViewCellStyle2
        DataGridView1.ColumnHeadersHeightSizeMode = DataGridViewColumnHeadersHeightSizeMode.AutoSize
        DataGridView1.Location = New Point(216, 318)
        DataGridView1.Name = "DataGridView1"
        DataGridView1.ReadOnly = True
        DataGridView1.RowTemplate.Height = 25
        DataGridView1.Size = New Size(1085, 296)
        DataGridView1.TabIndex = 2
        ' 
        ' Label4
        ' 
        Label4.AutoSize = True
        Label4.BackColor = Color.Transparent
        Label4.Font = New Font("Bell MT", 14.25F, FontStyle.Bold, GraphicsUnit.Point)
        Label4.ForeColor = Color.White
        Label4.Location = New Point(926, 44)
        Label4.Name = "Label4"
        Label4.Size = New Size(296, 24)
        Label4.TabIndex = 26
        Label4.Text = "Enter the name you want to search"
        ' 
        ' visitorID_pboxad
        ' 
        visitorID_pboxad.BackColor = Color.Transparent
        visitorID_pboxad.BackgroundImage = My.Resources.Resources.id__1_
        visitorID_pboxad.BackgroundImageLayout = ImageLayout.Stretch
        visitorID_pboxad.BorderStyle = BorderStyle.Fixed3D
        visitorID_pboxad.ImeMode = ImeMode.NoControl
        visitorID_pboxad.Location = New Point(1086, 119)
        visitorID_pboxad.Name = "visitorID_pboxad"
        visitorID_pboxad.Size = New Size(201, 167)
        visitorID_pboxad.SizeMode = PictureBoxSizeMode.StretchImage
        visitorID_pboxad.TabIndex = 16
        visitorID_pboxad.TabStop = False
        ' 
        ' visitor_pboxad
        ' 
        visitor_pboxad.BackColor = Color.Transparent
        visitor_pboxad.BackgroundImage = My.Resources.Resources.face_detection
        visitor_pboxad.BackgroundImageLayout = ImageLayout.Stretch
        visitor_pboxad.BorderStyle = BorderStyle.Fixed3D
        visitor_pboxad.ImeMode = ImeMode.NoControl
        visitor_pboxad.Location = New Point(850, 119)
        visitor_pboxad.Name = "visitor_pboxad"
        visitor_pboxad.Size = New Size(201, 167)
        visitor_pboxad.SizeMode = PictureBoxSizeMode.StretchImage
        visitor_pboxad.TabIndex = 15
        visitor_pboxad.TabStop = False
        ' 
        ' Label7
        ' 
        Label7.AutoSize = True
        Label7.BackColor = Color.Transparent
        Label7.Font = New Font("Segoe UI Semibold", 11.25F, FontStyle.Bold, GraphicsUnit.Point)
        Label7.ForeColor = Color.White
        Label7.Location = New Point(944, 617)
        Label7.Name = "Label7"
        Label7.Size = New Size(53, 20)
        Label7.TabIndex = 31
        Label7.Text = "Label7"
        ' 
        ' Label5
        ' 
        Label5.AutoSize = True
        Label5.BackColor = Color.Transparent
        Label5.Font = New Font("Bell MT", 12F, FontStyle.Bold, GraphicsUnit.Point)
        Label5.ForeColor = Color.White
        Label5.Location = New Point(216, 267)
        Label5.Name = "Label5"
        Label5.Size = New Size(167, 19)
        Label5.TabIndex = 28
        Label5.Text = "Filter Records by date"
        ' 
        ' d1
        ' 
        d1.CustomFormat = "yyyy-MM-dd"
        d1.Location = New Point(218, 288)
        d1.Name = "d1"
        d1.Size = New Size(165, 23)
        d1.TabIndex = 29
        ' 
        ' Label1
        ' 
        Label1.AutoSize = True
        Label1.BackColor = Color.Transparent
        Label1.Font = New Font("Myanmar Text", 48F, FontStyle.Bold, GraphicsUnit.Point)
        Label1.ForeColor = Color.White
        Label1.Location = New Point(343, 20)
        Label1.Name = "Label1"
        Label1.Size = New Size(374, 114)
        Label1.TabIndex = 0
        Label1.Text = "Dashboard"
        ' 
        ' PictureBox7
        ' 
        PictureBox7.BackColor = Color.Transparent
        PictureBox7.BackgroundImage = My.Resources.Resources.visitor__1__removebg_preview
        PictureBox7.BackgroundImageLayout = ImageLayout.Stretch
        PictureBox7.ImeMode = ImeMode.NoControl
        PictureBox7.Location = New Point(1247, 661)
        PictureBox7.Name = "PictureBox7"
        PictureBox7.Size = New Size(57, 50)
        PictureBox7.SizeMode = PictureBoxSizeMode.StretchImage
        PictureBox7.TabIndex = 42
        PictureBox7.TabStop = False
        ' 
        ' Label2
        ' 
        Label2.AutoSize = True
        Label2.BackColor = Color.Transparent
        Label2.Font = New Font("Myanmar Text", 36F, FontStyle.Bold, GraphicsUnit.Point)
        Label2.ForeColor = Color.White
        Label2.Location = New Point(239, 119)
        Label2.Name = "Label2"
        Label2.Size = New Size(591, 85)
        Label2.TabIndex = 1
        Label2.Text = "Visitors Tracking System"
        ' 
        ' reloadBtnPb
        ' 
        reloadBtnPb.BackColor = Color.White
        reloadBtnPb.BackgroundImage = My.Resources.Resources.Screenshot_2023_11_17_142344_removebg_preview1
        reloadBtnPb.BackgroundImageLayout = ImageLayout.Stretch
        reloadBtnPb.Location = New Point(218, 617)
        reloadBtnPb.Name = "reloadBtnPb"
        reloadBtnPb.Size = New Size(123, 38)
        reloadBtnPb.TabIndex = 44
        reloadBtnPb.TabStop = False
        ' 
        ' adminform
        ' 
        AutoScaleDimensions = New SizeF(7F, 15F)
        AutoScaleMode = AutoScaleMode.Font
        AutoValidate = AutoValidate.EnableAllowFocusChange
        BackColor = SystemColors.ControlLightLight
        BackgroundImage = My.Resources.Resources.Screenshot__48_
        BackgroundImageLayout = ImageLayout.Stretch
        ClientSize = New Size(1309, 713)
        ControlBox = False
        Controls.Add(PictureBox7)
        Controls.Add(reloadBtnPb)
        Controls.Add(Panel1)
        Controls.Add(DataGridView1)
        Controls.Add(Label2)
        Controls.Add(Label6)
        Controls.Add(visitorID_pboxad)
        Controls.Add(Label5)
        Controls.Add(Label4)
        Controls.Add(Label3)
        Controls.Add(visitor_pboxad)
        Controls.Add(AdsearchTxtbx)
        Controls.Add(Label1)
        Controls.Add(d1)
        Controls.Add(Label8)
        Controls.Add(Label7)
        DoubleBuffered = True
        FormBorderStyle = FormBorderStyle.None
        Name = "adminform"
        Text = "Admin"
        Panel1.ResumeLayout(False)
        Panel1.PerformLayout()
        CType(PictureBox6, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox4, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).EndInit()
        CType(DataGridView1, ComponentModel.ISupportInitialize).EndInit()
        CType(visitorID_pboxad, ComponentModel.ISupportInitialize).EndInit()
        CType(visitor_pboxad, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox7, ComponentModel.ISupportInitialize).EndInit()
        CType(reloadBtnPb, ComponentModel.ISupportInitialize).EndInit()
        ResumeLayout(False)
        PerformLayout()
    End Sub
    Friend WithEvents viewreportbtn As Button
    Friend WithEvents reloadBtn As Button
    Friend WithEvents Label6 As Label
    Friend WithEvents createbtn As Button
    Friend WithEvents Panel1 As Panel
    Friend WithEvents adname As Label
    Friend WithEvents logoutbtn As Button
    Friend WithEvents PictureBox4 As PictureBox
    Friend WithEvents PictureBox3 As PictureBox
    Friend WithEvents PictureBox2 As PictureBox
    Friend WithEvents PictureBox1 As PictureBox
    Friend WithEvents PictureBox6 As PictureBox
    Friend WithEvents Button1 As Button
    Friend WithEvents Label3 As Label
    Friend WithEvents AdsearchTxtbx As TextBox
    Friend WithEvents Label8 As Label
    Friend WithEvents DataGridView1 As DataGridView
    Friend WithEvents Label4 As Label
    Friend WithEvents visitorID_pboxad As PictureBox
    Friend WithEvents visitor_pboxad As PictureBox
    Friend WithEvents Label7 As Label
    Friend WithEvents Label5 As Label
    Friend WithEvents d1 As DateTimePicker
    Friend WithEvents Label1 As Label
    Friend WithEvents PictureBox7 As PictureBox
    Friend WithEvents Label2 As Label
    Friend WithEvents reloadBtnPb As PictureBox
    Friend WithEvents uname As Label
End Class
