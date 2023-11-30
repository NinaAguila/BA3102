<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class userform
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
        Dim resources As ComponentModel.ComponentResourceManager = New ComponentModel.ComponentResourceManager(GetType(userform))
        Label3 = New Label()
        Label4 = New Label()
        Label5 = New Label()
        Label6 = New Label()
        Label7 = New Label()
        fullnametxtbx = New TextBox()
        addresstxtbx = New TextBox()
        cnumbertxtbx = New TextBox()
        Label8 = New Label()
        visitor_pbox = New PictureBox()
        Label9 = New Label()
        visitorID_pbox = New PictureBox()
        startCam1 = New Button()
        take2 = New Button()
        Take1 = New Button()
        start2btn = New Button()
        ComboBoxDept = New ComboBox()
        ComboBoxPurp = New ComboBox()
        specifiedtxtbx = New TextBox()
        Label2 = New Label()
        UidTxtbx = New TextBox()
        Label10 = New Label()
        Panel1 = New Panel()
        submitbtn = New Button()
        PictureBox4 = New PictureBox()
        Label1 = New Label()
        Label11 = New Label()
        Label12 = New Label()
        PictureBox2 = New PictureBox()
        PictureBox10 = New PictureBox()
        PictureBox1 = New PictureBox()
        CType(visitor_pbox, ComponentModel.ISupportInitialize).BeginInit()
        CType(visitorID_pbox, ComponentModel.ISupportInitialize).BeginInit()
        Panel1.SuspendLayout()
        CType(PictureBox4, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox10, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).BeginInit()
        SuspendLayout()
        ' 
        ' Label3
        ' 
        resources.ApplyResources(Label3, "Label3")
        Label3.BackColor = Color.Transparent
        Label3.ForeColor = Color.White
        Label3.Name = "Label3"
        ' 
        ' Label4
        ' 
        resources.ApplyResources(Label4, "Label4")
        Label4.BackColor = Color.Transparent
        Label4.ForeColor = Color.White
        Label4.Name = "Label4"
        ' 
        ' Label5
        ' 
        resources.ApplyResources(Label5, "Label5")
        Label5.BackColor = Color.Transparent
        Label5.ForeColor = Color.White
        Label5.Name = "Label5"
        ' 
        ' Label6
        ' 
        resources.ApplyResources(Label6, "Label6")
        Label6.BackColor = Color.Transparent
        Label6.ForeColor = Color.White
        Label6.Name = "Label6"
        ' 
        ' Label7
        ' 
        resources.ApplyResources(Label7, "Label7")
        Label7.BackColor = Color.Transparent
        Label7.ForeColor = Color.White
        Label7.Name = "Label7"
        ' 
        ' fullnametxtbx
        ' 
        resources.ApplyResources(fullnametxtbx, "fullnametxtbx")
        fullnametxtbx.Name = "fullnametxtbx"
        ' 
        ' addresstxtbx
        ' 
        resources.ApplyResources(addresstxtbx, "addresstxtbx")
        addresstxtbx.Name = "addresstxtbx"
        ' 
        ' cnumbertxtbx
        ' 
        resources.ApplyResources(cnumbertxtbx, "cnumbertxtbx")
        cnumbertxtbx.Name = "cnumbertxtbx"
        ' 
        ' Label8
        ' 
        resources.ApplyResources(Label8, "Label8")
        Label8.BackColor = Color.Transparent
        Label8.ForeColor = Color.White
        Label8.Name = "Label8"
        ' 
        ' visitor_pbox
        ' 
        visitor_pbox.BackColor = Color.Transparent
        visitor_pbox.BackgroundImage = My.Resources.Resources.face_detection
        resources.ApplyResources(visitor_pbox, "visitor_pbox")
        visitor_pbox.BorderStyle = BorderStyle.Fixed3D
        visitor_pbox.Name = "visitor_pbox"
        visitor_pbox.TabStop = False
        ' 
        ' Label9
        ' 
        resources.ApplyResources(Label9, "Label9")
        Label9.BackColor = Color.Transparent
        Label9.ForeColor = Color.White
        Label9.Name = "Label9"
        ' 
        ' visitorID_pbox
        ' 
        visitorID_pbox.BackColor = Color.Transparent
        visitorID_pbox.BackgroundImage = My.Resources.Resources.id__1_
        resources.ApplyResources(visitorID_pbox, "visitorID_pbox")
        visitorID_pbox.BorderStyle = BorderStyle.Fixed3D
        visitorID_pbox.Name = "visitorID_pbox"
        visitorID_pbox.TabStop = False
        ' 
        ' startCam1
        ' 
        resources.ApplyResources(startCam1, "startCam1")
        startCam1.BackColor = Color.White
        startCam1.ForeColor = Color.Black
        startCam1.Name = "startCam1"
        startCam1.UseVisualStyleBackColor = False
        ' 
        ' take2
        ' 
        resources.ApplyResources(take2, "take2")
        take2.BackColor = Color.White
        take2.ForeColor = Color.Black
        take2.Name = "take2"
        take2.UseVisualStyleBackColor = False
        ' 
        ' Take1
        ' 
        resources.ApplyResources(Take1, "Take1")
        Take1.BackColor = Color.White
        Take1.ForeColor = Color.Black
        Take1.Name = "Take1"
        Take1.UseVisualStyleBackColor = False
        ' 
        ' start2btn
        ' 
        resources.ApplyResources(start2btn, "start2btn")
        start2btn.BackColor = Color.White
        start2btn.ForeColor = Color.Black
        start2btn.Name = "start2btn"
        start2btn.UseVisualStyleBackColor = False
        ' 
        ' ComboBoxDept
        ' 
        ComboBoxDept.FormattingEnabled = True
        ComboBoxDept.Items.AddRange(New Object() {resources.GetString("ComboBoxDept.Items"), resources.GetString("ComboBoxDept.Items1"), resources.GetString("ComboBoxDept.Items2"), resources.GetString("ComboBoxDept.Items3"), resources.GetString("ComboBoxDept.Items4"), resources.GetString("ComboBoxDept.Items5"), resources.GetString("ComboBoxDept.Items6"), resources.GetString("ComboBoxDept.Items7")})
        resources.ApplyResources(ComboBoxDept, "ComboBoxDept")
        ComboBoxDept.Name = "ComboBoxDept"
        ComboBoxDept.Tag = ""
        ' 
        ' ComboBoxPurp
        ' 
        ComboBoxPurp.FormattingEnabled = True
        ComboBoxPurp.Items.AddRange(New Object() {resources.GetString("ComboBoxPurp.Items"), resources.GetString("ComboBoxPurp.Items1"), resources.GetString("ComboBoxPurp.Items2"), resources.GetString("ComboBoxPurp.Items3"), resources.GetString("ComboBoxPurp.Items4"), resources.GetString("ComboBoxPurp.Items5")})
        resources.ApplyResources(ComboBoxPurp, "ComboBoxPurp")
        ComboBoxPurp.Name = "ComboBoxPurp"
        ' 
        ' specifiedtxtbx
        ' 
        resources.ApplyResources(specifiedtxtbx, "specifiedtxtbx")
        specifiedtxtbx.Name = "specifiedtxtbx"
        ' 
        ' Label2
        ' 
        resources.ApplyResources(Label2, "Label2")
        Label2.BackColor = Color.Transparent
        Label2.ForeColor = Color.White
        Label2.Name = "Label2"
        ' 
        ' UidTxtbx
        ' 
        resources.ApplyResources(UidTxtbx, "UidTxtbx")
        UidTxtbx.Name = "UidTxtbx"
        ' 
        ' Label10
        ' 
        resources.ApplyResources(Label10, "Label10")
        Label10.BackColor = Color.Transparent
        Label10.ForeColor = Color.White
        Label10.Name = "Label10"
        ' 
        ' Panel1
        ' 
        Panel1.BackColor = Color.Silver
        Panel1.BackgroundImage = My.Resources.Resources._395414666_6196295990470090_3974335045363994889_n
        resources.ApplyResources(Panel1, "Panel1")
        Panel1.Controls.Add(visitor_pbox)
        Panel1.Controls.Add(Label3)
        Panel1.Controls.Add(UidTxtbx)
        Panel1.Controls.Add(Label4)
        Panel1.Controls.Add(Label10)
        Panel1.Controls.Add(Label5)
        Panel1.Controls.Add(Label2)
        Panel1.Controls.Add(Label6)
        Panel1.Controls.Add(specifiedtxtbx)
        Panel1.Controls.Add(Label7)
        Panel1.Controls.Add(ComboBoxPurp)
        Panel1.Controls.Add(fullnametxtbx)
        Panel1.Controls.Add(ComboBoxDept)
        Panel1.Controls.Add(addresstxtbx)
        Panel1.Controls.Add(cnumbertxtbx)
        Panel1.Controls.Add(start2btn)
        Panel1.Controls.Add(Label8)
        Panel1.Controls.Add(Take1)
        Panel1.Controls.Add(Label9)
        Panel1.Controls.Add(submitbtn)
        Panel1.Controls.Add(visitorID_pbox)
        Panel1.Controls.Add(take2)
        Panel1.Controls.Add(startCam1)
        Panel1.Name = "Panel1"
        ' 
        ' submitbtn
        ' 
        resources.ApplyResources(submitbtn, "submitbtn")
        submitbtn.BackColor = Color.White
        submitbtn.ForeColor = Color.Black
        submitbtn.Name = "submitbtn"
        submitbtn.UseVisualStyleBackColor = False
        ' 
        ' PictureBox4
        ' 
        PictureBox4.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        resources.ApplyResources(PictureBox4, "PictureBox4")
        PictureBox4.Name = "PictureBox4"
        PictureBox4.TabStop = False
        ' 
        ' Label1
        ' 
        resources.ApplyResources(Label1, "Label1")
        Label1.BackColor = Color.Transparent
        Label1.ForeColor = Color.White
        Label1.Name = "Label1"
        ' 
        ' Label11
        ' 
        resources.ApplyResources(Label11, "Label11")
        Label11.BackColor = Color.Transparent
        Label11.ForeColor = Color.White
        Label11.Name = "Label11"
        ' 
        ' Label12
        ' 
        resources.ApplyResources(Label12, "Label12")
        Label12.BackColor = Color.Transparent
        Label12.ForeColor = Color.White
        Label12.Name = "Label12"
        ' 
        ' PictureBox2
        ' 
        PictureBox2.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        resources.ApplyResources(PictureBox2, "PictureBox2")
        PictureBox2.Name = "PictureBox2"
        PictureBox2.TabStop = False
        ' 
        ' PictureBox10
        ' 
        PictureBox10.BackColor = Color.Transparent
        PictureBox10.BackgroundImage = My.Resources.Resources.icons8_x_48
        resources.ApplyResources(PictureBox10, "PictureBox10")
        PictureBox10.Name = "PictureBox10"
        PictureBox10.TabStop = False
        ' 
        ' PictureBox1
        ' 
        PictureBox1.BackColor = Color.Transparent
        PictureBox1.BackgroundImage = My.Resources.Resources.visitor__1__removebg_preview
        resources.ApplyResources(PictureBox1, "PictureBox1")
        PictureBox1.Name = "PictureBox1"
        PictureBox1.TabStop = False
        ' 
        ' userform
        ' 
        resources.ApplyResources(Me, "$this")
        AutoScaleMode = AutoScaleMode.Font
        BackColor = SystemColors.InactiveCaption
        BackgroundImage = My.Resources.Resources._395250384_778784330671856_5027747898848162736_n
        ControlBox = False
        Controls.Add(PictureBox1)
        Controls.Add(PictureBox10)
        Controls.Add(PictureBox4)
        Controls.Add(Label1)
        Controls.Add(Label11)
        Controls.Add(Label12)
        Controls.Add(PictureBox2)
        Controls.Add(Panel1)
        DoubleBuffered = True
        FormBorderStyle = FormBorderStyle.None
        Name = "userform"
        CType(visitor_pbox, ComponentModel.ISupportInitialize).EndInit()
        CType(visitorID_pbox, ComponentModel.ISupportInitialize).EndInit()
        Panel1.ResumeLayout(False)
        Panel1.PerformLayout()
        CType(PictureBox4, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox10, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).EndInit()
        ResumeLayout(False)
        PerformLayout()
    End Sub
    Friend WithEvents Label3 As Label
    Friend WithEvents Label4 As Label
    Friend WithEvents Label5 As Label
    Friend WithEvents Label6 As Label
    Friend WithEvents Label7 As Label
    Friend WithEvents fullnametxtbx As TextBox
    Friend WithEvents addresstxtbx As TextBox
    Friend WithEvents cnumbertxtbx As TextBox
    Friend WithEvents Label8 As Label
    Friend WithEvents visitor_pbox As PictureBox
    Friend WithEvents Label9 As Label
    Friend WithEvents visitorID_pbox As PictureBox
    Friend WithEvents startCam1 As Button
    Friend WithEvents take2 As Button
    Friend WithEvents Take1 As Button
    Friend WithEvents start2btn As Button
    Friend WithEvents ComboBoxDept As ComboBox
    Friend WithEvents ComboBoxPurp As ComboBox
    Friend WithEvents specifiedtxtbx As TextBox
    Friend WithEvents Label2 As Label
    Friend WithEvents UidTxtbx As TextBox
    Friend WithEvents Label10 As Label
    Friend WithEvents Panel1 As Panel
    Friend WithEvents PictureBox4 As PictureBox
    Friend WithEvents Label1 As Label
    Friend WithEvents Label11 As Label
    Friend WithEvents Label12 As Label
    Friend WithEvents PictureBox2 As PictureBox
    Friend WithEvents PictureBox10 As PictureBox
    Friend WithEvents PictureBox1 As PictureBox
    Friend WithEvents submitbtn As Button
End Class
