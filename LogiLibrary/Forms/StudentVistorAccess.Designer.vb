<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()>
Partial Class StudentVistorAccess
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
        Me.components = New System.ComponentModel.Container()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(StudentVistorAccess))
        Me.btnBack = New System.Windows.Forms.Button()
        Me.btnTimeInOut = New System.Windows.Forms.Button()
        Me.PictureBox1 = New System.Windows.Forms.PictureBox()
        Me.Label1 = New System.Windows.Forms.Label()
        Me.cmb_device = New System.Windows.Forms.ComboBox()
        Me.txtDecodedQr = New System.Windows.Forms.TextBox()
        Me.Timer1 = New System.Windows.Forms.Timer(Me.components)
        Me.Timer2 = New System.Windows.Forms.Timer(Me.components)
        Me.lbl_time = New System.Windows.Forms.Label()
        Me.lbl_date = New System.Windows.Forms.Label()
        Me.PanelHead = New System.Windows.Forms.Panel()
        Me.PanelMain = New System.Windows.Forms.Panel()
        Me.Panel3 = New System.Windows.Forms.Panel()
        Me.Panel2 = New System.Windows.Forms.Panel()
        Me.Panel1 = New System.Windows.Forms.Panel()
        CType(Me.PictureBox1, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.PanelHead.SuspendLayout()
        Me.PanelMain.SuspendLayout()
        Me.Panel3.SuspendLayout()
        Me.Panel2.SuspendLayout()
        Me.SuspendLayout()
        '
        'btnBack
        '
        Me.btnBack.BackColor = System.Drawing.Color.Red
        Me.btnBack.BackgroundImage = Global.LogiLibrary.My.Resources.Resources.R__2_
        Me.btnBack.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom
        Me.btnBack.FlatAppearance.BorderColor = System.Drawing.Color.White
        Me.btnBack.FlatAppearance.MouseDownBackColor = System.Drawing.Color.White
        Me.btnBack.FlatAppearance.MouseOverBackColor = System.Drawing.Color.FromArgb(CType(CType(192, Byte), Integer), CType(CType(0, Byte), Integer), CType(CType(0, Byte), Integer))
        Me.btnBack.FlatStyle = System.Windows.Forms.FlatStyle.Flat
        Me.btnBack.Location = New System.Drawing.Point(51, 24)
        Me.btnBack.Name = "btnBack"
        Me.btnBack.Size = New System.Drawing.Size(91, 71)
        Me.btnBack.TabIndex = 9
        Me.btnBack.UseVisualStyleBackColor = False
        '
        'btnTimeInOut
        '
        Me.btnTimeInOut.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.btnTimeInOut.BackColor = System.Drawing.Color.Red
        Me.btnTimeInOut.FlatAppearance.BorderColor = System.Drawing.Color.Red
        Me.btnTimeInOut.FlatAppearance.MouseDownBackColor = System.Drawing.Color.IndianRed
        Me.btnTimeInOut.FlatAppearance.MouseOverBackColor = System.Drawing.Color.DarkRed
        Me.btnTimeInOut.FlatStyle = System.Windows.Forms.FlatStyle.Flat
        Me.btnTimeInOut.Font = New System.Drawing.Font("Arial", 14.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.btnTimeInOut.ForeColor = System.Drawing.Color.White
        Me.btnTimeInOut.Location = New System.Drawing.Point(511, 816)
        Me.btnTimeInOut.Name = "btnTimeInOut"
        Me.btnTimeInOut.Size = New System.Drawing.Size(193, 53)
        Me.btnTimeInOut.TabIndex = 20
        Me.btnTimeInOut.Text = "Time In / Out"
        Me.btnTimeInOut.UseVisualStyleBackColor = False
        '
        'PictureBox1
        '
        Me.PictureBox1.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Left), System.Windows.Forms.AnchorStyles)
        Me.PictureBox1.Location = New System.Drawing.Point(470, 461)
        Me.PictureBox1.Name = "PictureBox1"
        Me.PictureBox1.Size = New System.Drawing.Size(257, 227)
        Me.PictureBox1.TabIndex = 21
        Me.PictureBox1.TabStop = False
        '
        'Label1
        '
        Me.Label1.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.Label1.AutoSize = True
        Me.Label1.BackColor = System.Drawing.Color.Transparent
        Me.Label1.Font = New System.Drawing.Font("Arial", 15.75!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.Label1.Location = New System.Drawing.Point(526, 715)
        Me.Label1.Name = "Label1"
        Me.Label1.Size = New System.Drawing.Size(169, 24)
        Me.Label1.TabIndex = 22
        Me.Label1.Text = "Select Camera: "
        '
        'cmb_device
        '
        Me.cmb_device.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.cmb_device.Font = New System.Drawing.Font("Arial", 9.75!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.cmb_device.FormattingEnabled = True
        Me.cmb_device.Location = New System.Drawing.Point(469, 757)
        Me.cmb_device.Name = "cmb_device"
        Me.cmb_device.Size = New System.Drawing.Size(258, 24)
        Me.cmb_device.TabIndex = 23
        '
        'txtDecodedQr
        '
        Me.txtDecodedQr.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Right), System.Windows.Forms.AnchorStyles)
        Me.txtDecodedQr.Location = New System.Drawing.Point(148, 501)
        Me.txtDecodedQr.Name = "txtDecodedQr"
        Me.txtDecodedQr.Size = New System.Drawing.Size(280, 21)
        Me.txtDecodedQr.TabIndex = 24
        Me.txtDecodedQr.Visible = False
        '
        'Timer1
        '
        Me.Timer1.Enabled = True
        '
        'Timer2
        '
        Me.Timer2.Interval = 1000
        '
        'lbl_time
        '
        Me.lbl_time.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Left), System.Windows.Forms.AnchorStyles)
        Me.lbl_time.BackColor = System.Drawing.Color.Transparent
        Me.lbl_time.Font = New System.Drawing.Font("Arial", 24.0!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_time.Location = New System.Drawing.Point(35, 757)
        Me.lbl_time.Name = "lbl_time"
        Me.lbl_time.Size = New System.Drawing.Size(393, 42)
        Me.lbl_time.TabIndex = 27
        Me.lbl_time.Text = "Time"
        Me.lbl_time.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'lbl_date
        '
        Me.lbl_date.Anchor = CType((System.Windows.Forms.AnchorStyles.Bottom Or System.Windows.Forms.AnchorStyles.Left), System.Windows.Forms.AnchorStyles)
        Me.lbl_date.BackColor = System.Drawing.Color.Transparent
        Me.lbl_date.Font = New System.Drawing.Font("Arial", 20.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.lbl_date.Location = New System.Drawing.Point(49, 823)
        Me.lbl_date.Name = "lbl_date"
        Me.lbl_date.Size = New System.Drawing.Size(379, 42)
        Me.lbl_date.TabIndex = 28
        Me.lbl_date.Text = "Date"
        Me.lbl_date.TextAlign = System.Drawing.ContentAlignment.MiddleRight
        '
        'PanelHead
        '
        Me.PanelHead.BackColor = System.Drawing.Color.Transparent
        Me.PanelHead.Controls.Add(Me.btnBack)
        Me.PanelHead.Dock = System.Windows.Forms.DockStyle.Top
        Me.PanelHead.Location = New System.Drawing.Point(0, 0)
        Me.PanelHead.Name = "PanelHead"
        Me.PanelHead.Size = New System.Drawing.Size(1920, 123)
        Me.PanelHead.TabIndex = 29
        '
        'PanelMain
        '
        Me.PanelMain.BackColor = System.Drawing.Color.Transparent
        Me.PanelMain.Controls.Add(Me.Panel3)
        Me.PanelMain.Controls.Add(Me.Panel2)
        Me.PanelMain.Controls.Add(Me.Panel1)
        Me.PanelMain.Dock = System.Windows.Forms.DockStyle.Fill
        Me.PanelMain.Location = New System.Drawing.Point(0, 123)
        Me.PanelMain.Name = "PanelMain"
        Me.PanelMain.Size = New System.Drawing.Size(1920, 938)
        Me.PanelMain.TabIndex = 30
        '
        'Panel3
        '
        Me.Panel3.Controls.Add(Me.lbl_time)
        Me.Panel3.Controls.Add(Me.lbl_date)
        Me.Panel3.Controls.Add(Me.txtDecodedQr)
        Me.Panel3.Dock = System.Windows.Forms.DockStyle.Right
        Me.Panel3.Location = New System.Drawing.Point(1407, 0)
        Me.Panel3.Name = "Panel3"
        Me.Panel3.Size = New System.Drawing.Size(513, 938)
        Me.Panel3.TabIndex = 31
        '
        'Panel2
        '
        Me.Panel2.Controls.Add(Me.btnTimeInOut)
        Me.Panel2.Controls.Add(Me.cmb_device)
        Me.Panel2.Controls.Add(Me.PictureBox1)
        Me.Panel2.Controls.Add(Me.Label1)
        Me.Panel2.Dock = System.Windows.Forms.DockStyle.Fill
        Me.Panel2.Location = New System.Drawing.Point(351, 0)
        Me.Panel2.Name = "Panel2"
        Me.Panel2.Size = New System.Drawing.Size(1569, 938)
        Me.Panel2.TabIndex = 30
        '
        'Panel1
        '
        Me.Panel1.Dock = System.Windows.Forms.DockStyle.Left
        Me.Panel1.Location = New System.Drawing.Point(0, 0)
        Me.Panel1.Name = "Panel1"
        Me.Panel1.Size = New System.Drawing.Size(351, 938)
        Me.Panel1.TabIndex = 29
        '
        'StudentVistorAccess
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(7.0!, 15.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.BackgroundImage = Global.LogiLibrary.My.Resources.Resources.Student_Access
        Me.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom
        Me.ClientSize = New System.Drawing.Size(1920, 1061)
        Me.Controls.Add(Me.PanelMain)
        Me.Controls.Add(Me.PanelHead)
        Me.DoubleBuffered = True
        Me.Font = New System.Drawing.Font("Arial", 9.0!, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None
        Me.Icon = CType(resources.GetObject("$this.Icon"), System.Drawing.Icon)
        Me.Margin = New System.Windows.Forms.Padding(4, 3, 4, 3)
        Me.Name = "StudentVistorAccess"
        Me.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen
        Me.Text = "StudentVistorAccess"
        Me.WindowState = System.Windows.Forms.FormWindowState.Maximized
        CType(Me.PictureBox1, System.ComponentModel.ISupportInitialize).EndInit()
        Me.PanelHead.ResumeLayout(False)
        Me.PanelMain.ResumeLayout(False)
        Me.Panel3.ResumeLayout(False)
        Me.Panel3.PerformLayout()
        Me.Panel2.ResumeLayout(False)
        Me.Panel2.PerformLayout()
        Me.ResumeLayout(False)

    End Sub

    Friend WithEvents btnBack As Button
    Friend WithEvents btnTimeInOut As Button
    Friend WithEvents PictureBox1 As PictureBox
    Friend WithEvents Label1 As Label
    Friend WithEvents cmb_device As ComboBox
    Friend WithEvents txtDecodedQr As TextBox
    Friend WithEvents Timer1 As Timer
    Friend WithEvents Timer2 As Timer
    Friend WithEvents lbl_time As Label
    Friend WithEvents lbl_date As Label
    Friend WithEvents PanelHead As Panel
    Friend WithEvents PanelMain As Panel
    Friend WithEvents Panel1 As Panel
    Friend WithEvents Panel3 As Panel
    Friend WithEvents Panel2 As Panel
End Class
