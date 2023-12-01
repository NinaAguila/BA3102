Imports MySql.Data.MySqlClient
Module DbConnection
    Public Function strconnection() As MySqlConnection
        Return New MySqlConnection("server=localhost;user id=root;database=db_ba3102")
    End Function
    Public strcon As MySqlConnection = strconnection()
End Module
