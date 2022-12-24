package db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;

//javac -cp ".:/home/cs/g.keskinkilic/mariadb-java-client-3.0.8.jar:" HW4.java
//export CLASSPATH="/home/cs/g.keskinkilic/mariadb-java-client-3.0.8.jar"
//javac -classpath /home/cs/g.keskinkilic/mariadb-java-client-3.0.8.jar:. HW4

public class Connect{

    // Constants
    private static final String DB_USERNAME = "root";
    private static final String DB_PASSWORD = "gokberk!";
    private static final String DB_URL = "jdbc:mysql://localhost:3306/kitabooku";

    public static void main(String[] args){
        try (Connection connection = DriverManager.getConnection(DB_URL, DB_USERNAME, DB_PASSWORD);
             Statement stmt = connection.createStatement()) {
            // Drop the tables if they already exist
            // (AUTHORUSER, should be dropped first to ensure no error occurs due to foreign key constraints)
            stmt.executeUpdate("DROP TABLE IF EXISTS AuthorUser;");
            // (READER AND ADMIN, should be dropped first to ensure no error occurs due to foreign key constraints)
            stmt.executeUpdate("DROP TABLE IF EXISTS Reader;");
            stmt.executeUpdate("DROP TABLE IF EXISTS Admin;");
            stmt.executeUpdate("DROP TABLE IF EXISTS User;");

            // Create the tables
            stmt.executeUpdate(
                "CREATE TABLE User("+
                    "username VARCHAR(255) NOT NULL,"+
                    "email VARCHAR(320) NOT NULL,"+
                    "pwd VARCHAR(32) NOT NULL,"+
                    "PRIMARY KEY (username)"+
                ")ENGINE=INNODB;"
            );

            stmt.executeUpdate(
                "CREATE TABLE Reader("+
                    "username VARCHAR(255) NOT NULL,"+
                    "xp INT NOT NULL,"+
                    "book_goal INT NOT NULL,"+
                    "status VARCHAR(320) NOT NULL,"+
                    "FOREIGN KEY (username) REFERENCES User(username)"+
                ")ENGINE=INNODB;"
            );

            stmt.executeUpdate(
                "CREATE TABLE AuthorUser(" +
                    "username VARCHAR(255) NOT NULL,"+
                    "FOREIGN KEY (username) REFERENCES Reader(username)"+
                ")ENGINE=INNODB;"
            );

            stmt.executeUpdate(
                "CREATE TABLE Admin(" +
                    "username VARCHAR(255) NOT NULL,"+
                    "FOREIGN KEY (username) REFERENCES User(username)"+
                ") ENGINE=InnoDB;"
            );

            // Insert values
            stmt.executeUpdate("INSERT INTO User VALUES ('gokiberk', 'gk@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Reader VALUES ('gokiberk', '0', '0', 'Goko Fav Quote');");

            stmt.executeUpdate("INSERT INTO User VALUES ('shanab', 'ass@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Reader VALUES ('shanab', '0', '0', 'Ata Fav Quote');");

            stmt.executeUpdate("INSERT INTO User VALUES ('sulo', 'sh@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Reader VALUES ('sulo', '0', '0', 'Sulo Fav Quote');");
            stmt.executeUpdate("INSERT INTO AuthorUser VALUES ('sulo');");

            stmt.executeUpdate("INSERT INTO User VALUES ('aydo', 'ay@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Admin VALUES ('aydo');");


            ResultSet rs = stmt.executeQuery("SELECT * FROM User;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT * FROM Reader;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT * FROM Admin;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT * FROM AuthorUser;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }

        } catch (SQLException ex){ // handle the exception
            ex.printStackTrace();
        }
    }

    /**
     * Displays the table contents.
     * @param rs table to print
     * @throws SQLException SQLException
     */
    private static void displayTable(ResultSet rs) throws SQLException {
        ResultSetMetaData rsmd = rs.getMetaData();
        int colNum = rsmd.getColumnCount();
        for (int i = 1; i <= colNum; i++) { // prints the seperator
            System.out.printf("---------- ");
        }
        System.out.println();
        for (int i = 1; i <= colNum; i++) { // prints the attribute names
            System.out.printf("%-11s", rsmd.getColumnLabel(i));
        }
        System.out.println();
        for (int i = 1; i <= colNum; i++) { // prints the seperator
            System.out.printf("---------- ");
        }
        System.out.println();
        while (rs.next()) {
            for (int i = 1; i <= colNum; i++) { // prints the rows
                System.out.printf("%-11s", rs.getString(i));
            }
            System.out.println(); // next column
        }
        for (int i = 1; i <= colNum; i++) { // prints the seperator
            System.out.printf("---------- ");
        }
        System.out.println();
        System.out.println();
    }
}