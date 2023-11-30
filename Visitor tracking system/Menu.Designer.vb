<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()>
Partial Class Menu
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
        Dim resources As ComponentModel.ComponentResourceManager = New ComponentModel.ComponentResourceManager(GetType(Menu))
        visitorbtn = New Button()
        Panel1 = New Panel()
        timeoutbtnPb = New PictureBox()
        visitorbtnPb = New PictureBox()
        PictureBox1 = New PictureBox()
        PictureBox4 = New PictureBox()
        Label7 = New Label()
        Label2 = New Label()
        Label3 = New Label()
        PictureBox2 = New PictureBox()
        PictureBox3 = New PictureBox()
        Panel1.SuspendLayout()
        CType(timeoutbtnPb, ComponentModel.ISupportInitialize).BeginInit()
        CType(visitorbtnPb, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox4, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).BeginInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).BeginInit()
        SuspendLayout()
        ' 
        ' visitorbtn
        ' 
        resources.ApplyResources(visitorbtn, "visitorbtn")
        visitorbtn.BackColor = Color.FromArgb(CByte(255), CByte(128), CByte(128))
        visitorbtn.Name = "visitorbtn"
        visitorbtn.UseVisualStyleBackColor = False
        ' 
        ' Panel1
        ' 
        Panel1.BackColor = Color.IndianRed
        resources.ApplyResources(Panel1, "Panel1")
        Panel1.Controls.Add(timeoutbtnPb)
        Panel1.Controls.Add(visitorbtnPb)
        Panel1.Controls.Add(PictureBox1)
        Panel1.Controls.Add(visitorbtn)
        Panel1.Name = "Panel1"
        ' 
        ' timeoutbtnPb
        ' 
        timeoutbtnPb.BackColor = Color.Transparent
        timeoutbtnPb.BackgroundImage = My.Resources.Resources.Screenshot__52__removebg_preview1
        resources.ApplyResources(timeoutbtnPb, "timeoutbtnPb")
        timeoutbtnPb.Name = "timeoutbtnPb"
        timeoutbtnPb.TabStop = False
        ' 
        ' visitorbtnPb
        ' 
        visitorbtnPb.BackColor = Color.Transparent
        visitorbtnPb.BackgroundImage = My.Resources.Resources.Screenshot__51__removebg_preview1
        resources.ApplyResources(visitorbtnPb, "visitorbtnPb")
        visitorbtnPb.Name = "visitorbtnPb"
        visitorbtnPb.TabStop = False
        ' 
        ' PictureBox1
        ' 
        PictureBox1.BackColor = Color.Transparent
        PictureBox1.BackgroundImage = My.Resources.Resources.visitor__1__removebg_preview
        resources.ApplyResources(PictureBox1, "PictureBox1")
        PictureBox1.Name = "PictureBox1"
        PictureBox1.TabStop = False
        ' 
        ' PictureBox4
        ' 
        PictureBox4.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        resources.ApplyResources(PictureBox4, "PictureBox4")
        PictureBox4.Name = "PictureBox4"
        PictureBox4.TabStop = False
        ' 
        ' Label7
        ' 
        resources.ApplyResources(Label7, "Label7")
        Label7.BackColor = Color.Transparent
        Label7.ForeColor = Color.White
        Label7.Name = "Label7"
        ' 
        ' Label2
        ' 
        resources.ApplyResources(Label2, "Label2")
        Label2.BackColor = Color.Transparent
        Label2.ForeColor = Color.White
        Label2.Name = "Label2"
        ' 
        ' Label3
        ' 
        resources.ApplyResources(Label3, "Label3")
        Label3.BackColor = Color.Transparent
        Label3.ForeColor = Color.White
        Label3.Name = "Label3"
        ' 
        ' PictureBox2
        ' 
        PictureBox2.BackgroundImage = My.Resources.Resources._383796627_1478769209583822_8048172331726838210_n
        resources.ApplyResources(PictureBox2, "PictureBox2")
        PictureBox2.Name = "PictureBox2"
        PictureBox2.TabStop = False
        ' 
        ' PictureBox3
        ' 
        PictureBox3.BackColor = Color.Transparent
        PictureBox3.BackgroundImage = My.Resources.Resources.visitor__1__removebg_preview
        resources.ApplyResources(PictureBox3, "PictureBox3")
        PictureBox3.Name = "PictureBox3"
        PictureBox3.TabStop = False
        ' 
        ' Menu
        ' 
        resources.ApplyResources(Me, "$this")
        AutoScaleMode = AutoScaleMode.Font
        BackgroundImage = My.Resources.Resources._395414666_6196295990470090_3974335045363994889_n
        ControlBox = False
        Controls.Add(PictureBox3)
        Controls.Add(PictureBox4)
        Controls.Add(Label7)
        Controls.Add(Label2)
        Controls.Add(Label3)
        Controls.Add(PictureBox2)
        Controls.Add(Panel1)
        DoubleBuffered = True
        ForeColor = Color.Transparent
        FormBorderStyle = FormBorderStyle.None
        Name = "Menu"
        Panel1.ResumeLayout(False)
        CType(timeoutbtnPb, ComponentModel.ISupportInitialize).EndInit()
        CType(visitorbtnPb, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox1, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox4, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox2, ComponentModel.ISupportInitialize).EndInit()
        CType(PictureBox3, ComponentModel.ISupportInitialize).EndInit()
        ResumeLayout(False)
        PerformLayout()
    End Sub
    Friend WithEvents visitorbtn As Button
    Friend WithEvents timeoutbtn As Button
    Friend WithEvents visen As RadioButton
    Friend WithEvents toen As RadioButton
    Friend WithEvents Panel1 As Panel
    Friend WithEvents PictureBox1 As PictureBox
    Friend WithEvents PictureBox4 As PictureBox
    Friend WithEvents Label7 As Label
    Friend WithEvents Label2 As Label
    Friend WithEvents Label3 As Label
    Friend WithEvents PictureBox2 As PictureBox
    Friend WithEvents PictureBox3 As PictureBox
    Friend WithEvents visitorbtnPb As PictureBox
    Friend WithEvents timeoutbtnPb As PictureBox
End Class
