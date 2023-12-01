<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class MainDashboard
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
        Me.components = New System.ComponentModel.Container()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(MainDashboard))
        Me.ButtonsPanel = New System.Windows.Forms.Panel()
        Me.btn2Panel = New System.Windows.Forms.Panel()
        Me.btnReports = New System.Windows.Forms.Button()
        Me.btnPanel = New System.Windows.Forms.Panel()
        Me.btnVisitorRegistration = New System.Windows.Forms.Button()
        Me.btn1Panel = New System.Windows.Forms.Panel()
        Me.btnAccess = New System.Windows.Forms.Button()
        Me.ExitPanel = New System.Windows.Forms.Panel()
        Me.btnExit = New System.Windows.Forms.Button()
        Me.CenterPanel = New System.Windows.Forms.Panel()
        Me.Panel1 = New System.Windows.Forms.Panel()
        Me.Label4 = New System.Windows.Forms.Label()
        Me.lbl_CIT = New System.Windows.Forms.Label()
        Me.lbl_Visitor = New System.Windows.Forms.Label()
        Me.lbl_CTE = New System.Windows.Forms.Label()
        Me.Label5 = New System.Windows.Forms.Label()
        Me.lbl_CICS = New System.Windows.Forms.Label()
        Me.lbl_CABE = New System.Windows.Forms.Label()
        Me.Label3 = New System.Windows.Forms.Label()
        Me.Label6 = New System.Windows.Forms.Label()
        Me.Label2 = New System.Windows.Forms.Label()
        Me.lbl_CAS = New System.Windows.Forms.Label()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.lbl_date = New System.Windows.Forms.Label()
        Me.lbl_time = New System.Windows.Forms.Label()
        Me.Timer1 = New System.Windows.Forms.Timer(Me.components)
        Me.ButtonsPanel.SuspendLayout()
        Me.btn2Panel.SuspendLayout()
        Me.btnPanel.SuspendLayout()
        Me.btn1Panel.SuspendLayout()
        Me.ExitPanel.SuspendLayout()
        Me.CenterPanel.SuspendLayout()
        Me.Panel1.SuspendLayout()
        Me.SuspendLayout()
        '
        'ButtonsPanel
        '
        Me.ButtonsPanel.Controls.Add(Me.btn2Panel)
        Me.ButtonsPanel.Controls.Add(Me.btnPanel)
        Me.ButtonsPanel.Controls.Add(Me.btn1Panel)
        Me.ButtonsPanel.Dock = System.Windows.Forms.DockStyle.Top
        Me.ButtonsPanel.Location = New System.Drawing.Point(0, 0)
        Me.ButtonsPanel.Name = "ButtonsPanel"
        Me.ButtonsPanel.Size = New System.Drawing.Size(1920, 125)
        Me.ButtonsPanel.TabIndex = 0
        '
        'btn2Panel
        '
        Me.btn2Panel.Controls.Add(Me.btnReports)
        Me.btn2Panel.Dock = System.Windows.Forms.DockStyle.Fill
        Me.btn2Panel.Location = New System.Drawing.Point(601, 0)
        Me.btn2Panel.Name = "btn2Panel"
        Me.btn2Panel.Size = New System.Drawing.Size(759, 125)
        Me.btn2Panel.TabIndex = 2
        '
        'btnReports
        '
        Me.btnReports.Dock = System.Windows.Forms.DockStyle.Fill
        Me.btnReports.FlatAppearance.MouseDownBackColor = System.Drawing.Color.FromArgb(CType(CType(255, Byte), Integer), CType(CType(128, Byte), Integer), CType(CType(128, Byte), Integer))
        Me.btnReports.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Red
        Me.btnReports.FlatStyle = System.Windows.Forms.FlatStyle.Flat
        Me.btnReports.Font = New System.Drawing.Font("Arial", 15.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnReports.Location = New System.Drawing.Point(0, 0)
        Me.btnReports.Name = "btnReports"
        Me.btnReports.Size = New System.Drawing.Size(759, 125)
        Me.btnReports.TabIndex = 1
        Me.btnReports.Text = "Reports"
        Me.btnReports.UseVisualStyleBackColor = True
        '
        'btnPanel
        '
        Me.btnPanel.Controls.Add(Me.btnVisitorRegistration)
        Me.btnPanel.Dock = System.Windows.Forms.DockStyle.Right
        Me.btnPanel.Location = New System.Drawing.Point(1360, 0)
        Me.btnPanel.Name = "btnPanel"
        Me.btnPanel.Size = New System.Drawing.Size(560, 125)
        Me.btnPanel.TabIndex = 1
        '
        'btnVisitorRegistration
        '
        Me.btnVisitorRegistration.Dock = System.Windows.Forms.DockStyle.Fill
        Me.btnVisitorRegistration.FlatAppearance.MouseDownBackColor = System.Drawing.Color.FromArgb(CType(CType(255, Byte), Integer), CType(CType(128, Byte), Integer), CType(CType(128, Byte), Integer))
        Me.btnVisitorRegistration.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Red
        Me.btnVisitorRegistration.FlatStyle = System.Windows.Forms.FlatStyle.Flat
        Me.btnVisitorRegistration.Font = New System.Drawing.Font("Arial", 15.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnVisitorRegistration.Location = New System.Drawing.Point(0, 0)
        Me.btnVisitorRegistration.Name = "btnVisitorRegistration"
        Me.btnVisitorRegistration.Size = New System.Drawing.Size(560, 125)
        Me.btnVisitorRegistration.TabIndex = 1
        Me.btnVisitorRegistration.Text = "Visitor Registration"
        Me.btnVisitorRegistration.UseVisualStyleBackColor = True
        '
        'btn1Panel
        '
        Me.btn1Panel.Controls.Add(Me.btnAccess)
        Me.btn1Panel.Dock = System.Windows.Forms.DockStyle.Left
        Me.btn1Panel.Location = New System.Drawing.Point(0, 0)
        Me.btn1Panel.Name = "btn1Panel"
        Me.btn1Panel.Size = New System.Drawing.Size(601, 125)
        Me.btn1Panel.TabIndex = 0
        '
        'btnAccess
        '
        Me.btnAccess.Dock = System.Windows.Forms.DockStyle.Fill
        Me.btnAccess.FlatAppearance.MouseDownBackColor = System.Drawing.Color.FromArgb(CType(CType(255, Byte), Integer), CType(CType(128, Byte), Integer), CType(CType(128, Byte), Integer))
        Me.btnAccess.FlatAppearance.MouseOverBackColor = System.Drawing.Color.Red
        Me.btnAccess.FlatStyle = System.Windows.Forms.FlatStyle.Flat
        Me.btnAccess.Font = New System.Drawing.Font("Arial", 15.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnAccess.Location = New System.Drawing.Point(0, 0)
        Me.btnAccess.Name = "btnAccess"
        Me.btnAccess.Size = New System.Drawing.Size(601, 125)
        Me.btnAccess.TabIndex = 0
        Me.btnAccess.Text = "Student / Visitor Access"
        Me.btnAccess.UseVisualStyleBackColor = True
        '
        'ExitPanel
        '
        Me.ExitPanel.BackColor = System.Drawing.Color.Transparent
        Me.ExitPanel.Controls.Add(Me.btnExit)
        Me.ExitPanel.Dock = System.Windows.Forms.DockStyle.Top
        Me.ExitPanel.Location = New System.Drawing.Point(0, 0)
        Me.ExitPanel.Name = "ExitPanel"
        Me.ExitPanel.Size = New System.Drawing.Size(1920, 120)
        Me.ExitPanel.TabIndex = 2
        '
        'btnExit
        '
        Me.btnExit.Anchor = CType((System.Windows.Forms.AnchorStyles.Top Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.btnExit.BackColor = System.Drawing.Color.Red
        Me.btnExit.FlatAppearance.BorderColor = System.Drawing.Color.White
        Me.btnExit.FlatAppearance.MouseDownBackColor = System.Drawing.Color.White
        Me.btnExit.FlatAppearance.MouseOverBackColor = System.Drawing.Color.FromArgb(CType(CType(192, Byte), Integer), CType(CType(0, Byte), Integer), CType(CType(0, Byte), Integer))
        Me.btnExit.FlatStyle = System.Windows.Forms.FlatStyle.Flat
        Me.btnExit.Font = New System.Drawing.Font("Arial", 11.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnExit.ForeColor = System.Drawing.Color.White
        Me.btnExit.Location = New System.Drawing.Point(1743, 36)
        Me.btnExit.Name = "btnExit"
        Me.btnExit.Size = New System.Drawing.Size(125, 57)
        Me.btnExit.TabIndex = 6
        Me.btnExit.Text = "Exit"
        Me.btnExit.UseVisualStyleBackColor = False
        '
        'CenterPanel
        '
        Me.CenterPanel.BackColor = System.Drawing.Color.Transparent
        Me.CenterPanel.Controls.Add(Me.Panel1)
        Me.CenterPanel.Controls.Add(Me.lbl_date)
        Me.CenterPanel.Controls.Add(Me.lbl_time)
        Me.CenterPanel.Controls.Add(Me.ButtonsPanel)
        Me.CenterPanel.Dock = System.Windows.Forms.DockStyle.Fill
        Me.CenterPanel.Font = New System.Drawing.Font("Arial", 14.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.CenterPanel.Location = New System.Drawing.Point(0, 120)
        Me.CenterPanel.Name = "CenterPanel"
        Me.CenterPanel.Size = New System.Drawing.Size(1920, 941)
        Me.CenterPanel.TabIndex = 3
        '
        'Panel1
        '
        Me.Panel1.Anchor = CType((System.Windows.Forms.AnchorStyles.Left Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.Panel1.Controls.Add(Me.Label4)
        Me.Panel1.Controls.Add(Me.lbl_CIT)
        Me.Panel1.Controls.Add(Me.lbl_Visitor)
        Me.Panel1.Controls.Add(Me.lbl_CTE)
        Me.Panel1.Controls.Add(Me.Label5)
        Me.Panel1.Controls.Add(Me.lbl_CICS)
        Me.Panel1.Controls.Add(Me.lbl_CABE)
        Me.Panel1.Controls.Add(Me.Label3)
        Me.Panel1.Controls.Add(Me.Label6)
        Me.Panel1.Controls.Add(Me.Label2)
        Me.Panel1.Controls.Add(Me.lbl_CAS)
        Me.Panel1.Controls.Add(Me.Label1)
        Me.Panel1.Location = New System.Drawing.Point(27, 288)
        Me.Panel1.Name = "Panel1"
        Me.Panel1.Size = New System.Drawing.Size(1861, 491)
        Me.Panel1.TabIndex = 42
        '
        'Label4
        '
        Me.Label4.AutoSize = True
        Me.Label4.Font = New System.Drawing.Font("Arial", 18.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label4.Location = New System.Drawing.Point(1166, 34)
        Me.Label4.Name = "Label4"
        Me.Label4.Size = New System.Drawing.Size(339, 29)
        Me.Label4.TabIndex = 33
        Me.Label4.Text = "No of Students on CAS Dept"
        '
        'lbl_CIT
        '
        Me.lbl_CIT.AutoSize = True
        Me.lbl_CIT.Font = New System.Drawing.Font("Arial", 24.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_CIT.ForeColor = System.Drawing.Color.Red
        Me.lbl_CIT.Location = New System.Drawing.Point(416, 403)
        Me.lbl_CIT.Name = "lbl_CIT"
        Me.lbl_CIT.Size = New System.Drawing.Size(180, 37)
        Me.lbl_CIT.TabIndex = 38
        Me.lbl_CIT.Text = "0 Students"
        '
        'lbl_Visitor
        '
        Me.lbl_Visitor.AutoSize = True
        Me.lbl_Visitor.Font = New System.Drawing.Font("Arial", 24.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_Visitor.ForeColor = System.Drawing.Color.Red
        Me.lbl_Visitor.Location = New System.Drawing.Point(1255, 400)
        Me.lbl_Visitor.Name = "lbl_Visitor"
        Me.lbl_Visitor.Size = New System.Drawing.Size(163, 37)
        Me.lbl_Visitor.TabIndex = 41
        Me.lbl_Visitor.Text = "0 Visitors"
        '
        'lbl_CTE
        '
        Me.lbl_CTE.AutoSize = True
        Me.lbl_CTE.Font = New System.Drawing.Font("Arial", 24.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_CTE.ForeColor = System.Drawing.Color.Red
        Me.lbl_CTE.Location = New System.Drawing.Point(416, 243)
        Me.lbl_CTE.Name = "lbl_CTE"
        Me.lbl_CTE.Size = New System.Drawing.Size(180, 37)
        Me.lbl_CTE.TabIndex = 37
        Me.lbl_CTE.Text = "0 Students"
        '
        'Label5
        '
        Me.Label5.AutoSize = True
        Me.Label5.Font = New System.Drawing.Font("Arial", 18.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label5.Location = New System.Drawing.Point(1166, 196)
        Me.Label5.Name = "Label5"
        Me.Label5.Size = New System.Drawing.Size(356, 29)
        Me.Label5.TabIndex = 34
        Me.Label5.Text = "No of Students on CABE Dept"
        '
        'lbl_CICS
        '
        Me.lbl_CICS.AutoSize = True
        Me.lbl_CICS.Font = New System.Drawing.Font("Arial", 24.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_CICS.ForeColor = System.Drawing.Color.Red
        Me.lbl_CICS.Location = New System.Drawing.Point(416, 79)
        Me.lbl_CICS.Name = "lbl_CICS"
        Me.lbl_CICS.Size = New System.Drawing.Size(180, 37)
        Me.lbl_CICS.TabIndex = 36
        Me.lbl_CICS.Text = "0 Students"
        '
        'lbl_CABE
        '
        Me.lbl_CABE.AutoSize = True
        Me.lbl_CABE.Font = New System.Drawing.Font("Arial", 24.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_CABE.ForeColor = System.Drawing.Color.Red
        Me.lbl_CABE.Location = New System.Drawing.Point(1255, 243)
        Me.lbl_CABE.Name = "lbl_CABE"
        Me.lbl_CABE.Size = New System.Drawing.Size(180, 37)
        Me.lbl_CABE.TabIndex = 40
        Me.lbl_CABE.Text = "0 Students"
        '
        'Label3
        '
        Me.Label3.AutoSize = True
        Me.Label3.Font = New System.Drawing.Font("Arial", 18.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label3.Location = New System.Drawing.Point(334, 353)
        Me.Label3.Name = "Label3"
        Me.Label3.Size = New System.Drawing.Size(328, 29)
        Me.Label3.TabIndex = 32
        Me.Label3.Text = "No of Students on CIT Dept"
        '
        'Label6
        '
        Me.Label6.AutoSize = True
        Me.Label6.Font = New System.Drawing.Font("Arial", 18.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label6.Location = New System.Drawing.Point(1265, 353)
        Me.Label6.Name = "Label6"
        Me.Label6.Size = New System.Drawing.Size(170, 29)
        Me.Label6.TabIndex = 35
        Me.Label6.Text = "No of Visitors"
        '
        'Label2
        '
        Me.Label2.AutoSize = True
        Me.Label2.Font = New System.Drawing.Font("Arial", 18.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label2.Location = New System.Drawing.Point(334, 196)
        Me.Label2.Name = "Label2"
        Me.Label2.Size = New System.Drawing.Size(337, 29)
        Me.Label2.TabIndex = 31
        Me.Label2.Text = "No of Students on CTE Dept"
        '
        'lbl_CAS
        '
        Me.lbl_CAS.AutoSize = True
        Me.lbl_CAS.Font = New System.Drawing.Font("Arial", 24.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_CAS.ForeColor = System.Drawing.Color.Red
        Me.lbl_CAS.Location = New System.Drawing.Point(1255, 79)
        Me.lbl_CAS.Name = "lbl_CAS"
        Me.lbl_CAS.Size = New System.Drawing.Size(180, 37)
        Me.lbl_CAS.TabIndex = 39
        Me.lbl_CAS.Text = "0 Students"
        '
        'Label1
        '
        Me.Label1.AutoSize = True
        Me.Label1.Font = New System.Drawing.Font("Arial", 18.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(331, 34)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(346, 29)
        Me.Label1.TabIndex = 30
        Me.Label1.Text = "No of Students on CICS Dept"
        '
        'lbl_date
        '
        Me.lbl_date.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.lbl_date.BackColor = System.Drawing.Color.Transparent
        Me.lbl_date.Font = New System.Drawing.Font("Arial", 20.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_date.Location = New System.Drawing.Point(1426, 850)
        Me.lbl_date.Name = "lbl_date"
        Me.lbl_date.Size = New System.Drawing.Size(286, 42)
        Me.lbl_date.TabIndex = 29
        Me.lbl_date.Text = "Date"
        Me.lbl_date.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'lbl_time
        '
        Me.lbl_time.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.lbl_time.BackColor = System.Drawing.Color.Transparent
        Me.lbl_time.Font = New System.Drawing.Font("Arial", 26.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_time.Location = New System.Drawing.Point(1426, 798)
        Me.lbl_time.Name = "lbl_time"
        Me.lbl_time.Size = New System.Drawing.Size(286, 42)
        Me.lbl_time.TabIndex = 28
        Me.lbl_time.Text = "Time"
        Me.lbl_time.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'Timer1
        '
        Me.Timer1.Enabled = True
        '
        'MainDashboard
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 16.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.BackgroundImage = Global.LogiLibrary.My.Resources.Resources.MainDashBoard
        Me.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom
        Me.ClientSize = New System.Drawing.Size(1920, 1061)
        Me.Controls.Add(Me.CenterPanel)
        Me.Controls.Add(Me.ExitPanel)
        Me.DoubleBuffered = True
        Me.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Margin = New System.Windows.Forms.Padding(4)
        Me.Name = "MainDashboard"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "MainDashboard"
        Me.WindowState = System.Windows.Forms.FormWindowState.Maximized
        Me.ButtonsPanel.ResumeLayout(False)
        Me.btn2Panel.ResumeLayout(False)
        Me.btnPanel.ResumeLayout(False)
        Me.btn1Panel.ResumeLayout(False)
        Me.ExitPanel.ResumeLayout(False)
        Me.CenterPanel.ResumeLayout(False)
        Me.Panel1.ResumeLayout(False)
        Me.Panel1.PerformLayout()
        Me.ResumeLayout(False)

    End Sub

    Friend WithEvents ButtonsPanel As Panel
    Friend WithEvents btn1Panel As Panel
    Friend WithEvents btn2Panel As Panel
    Friend WithEvents btnPanel As Panel
    Friend WithEvents btnAccess As Button
    Friend WithEvents ExitPanel As Panel
    Friend WithEvents CenterPanel As Panel
    Friend WithEvents btnReports As Button
    Friend WithEvents btnVisitorRegistration As Button
    Friend WithEvents btnExit As Button
    Friend WithEvents lbl_time As Label
    Friend WithEvents lbl_date As Label
    Friend WithEvents Timer1 As Timer
    Friend WithEvents Label6 As Label
    Friend WithEvents Label5 As Label
    Friend WithEvents Label4 As Label
    Friend WithEvents Label3 As Label
    Friend WithEvents Label2 As Label
    Friend WithEvents Label1 As Label
    Friend WithEvents lbl_CICS As Label
    Friend WithEvents lbl_CIT As Label
    Friend WithEvents lbl_CTE As Label
    Friend WithEvents lbl_Visitor As Label
    Friend WithEvents lbl_CABE As Label
    Friend WithEvents lbl_CAS As Label
    Friend WithEvents Panel1 As Panel
End Class
