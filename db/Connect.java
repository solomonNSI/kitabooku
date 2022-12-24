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
            stmt.executeUpdate("DROP TABLE IF EXISTS has_review;");
            stmt.executeUpdate("DROP TABLE IF EXISTS post;");
            stmt.executeUpdate("DROP TABLE IF EXISTS has_wallet;");
            stmt.executeUpdate("DROP TABLE IF EXISTS Wallet;");
            //stmt.executeUpdate("DROP TABLE IF EXISTS read;");

            // (AUTHORUSER, should be dropped first to ensure no error occurs due to foreign key constraints)
            stmt.executeUpdate("DROP TABLE IF EXISTS AuthorUser;");
            stmt.executeUpdate("DROP TABLE IF EXISTS E_Book;");
            // (READER AND ADMIN, should be dropped first to ensure no error occurs due to foreign key constraints)
            stmt.executeUpdate("DROP TABLE IF EXISTS Reader;");
            stmt.executeUpdate("DROP TABLE IF EXISTS Admin;");
            stmt.executeUpdate("DROP TABLE IF EXISTS User;");
            stmt.executeUpdate("DROP TABLE IF EXISTS Review;");
            stmt.executeUpdate("DROP TABLE IF EXISTS Book;");


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

            stmt.executeUpdate(
                "CREATE TABLE Book("+
                    "b_id INT NOT NULL,"+
                    "title VARCHAR(60) NOT NULL,"+
                    "publisher VARCHAR(60) NOT NULL,"+
                    "publish_year INT NOT NULL,"+
                    "genre VARCHAR(60) NOT NULL,"+
                    "page_count INT NOT NULL,"+
                    "PRIMARY KEY (b_id)"+
                ")ENGINE=INNODB;"
            );

            stmt.executeUpdate(
                "CREATE TABLE Review ("+
                    "r_id INT NOT NULL,"+
                    "text VARCHAR(140) NOT NULL,"+
                    "rating INT(1) NOT NULL,"+
                    "PRIMARY KEY (r_id)"+
                 ");"
            );

            stmt.executeUpdate(
                    "CREATE TABLE has_review(" +
                        "b_id    INT," +
                        "r_id    INT," +
                        "PRIMARY KEY (b_id, r_id)," +
                        "FOREIGN KEY (b_id) REFERENCES Book(b_id) ON DELETE CASCADE," +
                        "FOREIGN KEY (r_id) REFERENCES Review(r_id) ON DELETE CASCADE" +
                    ") ENGINE=InnoDB;"
            );

            stmt.executeUpdate(
                    "CREATE TABLE post(" +
                        "username    VARCHAR(255)," +
                        "r_id    INT," +
                        "PRIMARY KEY (username, r_id)," +
                        "FOREIGN KEY (username) REFERENCES Reader(username) ON DELETE CASCADE," +
                        "FOREIGN KEY (r_id) REFERENCES Review(r_id) ON DELETE CASCADE" +
                    ") ENGINE=InnoDB;"
            );

/*             stmt.executeUpdate(
                    "CREATE TABLE read(" +
                        "username    VARCHAR(255)," +
                        "b_id    INT," +
                        "PRIMARY KEY (username, b_id)," +
                        "FOREIGN KEY (username) REFERENCES Reader(username) ON DELETE CASCADE," +
                        "FOREIGN KEY (b_id) REFERENCES Book(b_id) ON DELETE CASCADE" +
                    ") ENGINE=InnoDB;"
            ); */

            stmt.executeUpdate(
                "CREATE TABLE E_Book("+
                    "b_id INT NOT NULL,"+
                    "price INT NOT NULL,"+
                    "FOREIGN KEY (b_id) REFERENCES Book(b_id)"+
                ")ENGINE=INNODB;"
            );

            stmt.executeUpdate(
                "CREATE TABLE Wallet ("+
                    "w_id INT NOT NULL,"+
                    "balance INT NOT NULL,"+
                    "PRIMARY KEY (w_id)"+
                 ");"
            );

            stmt.executeUpdate(
                    "CREATE TABLE has_wallet(" +
                        "username    VARCHAR(255)," +
                        "w_id    INT," +
                        "PRIMARY KEY (username, w_id)," +
                        "FOREIGN KEY (username) REFERENCES Reader(username) ON DELETE CASCADE," +
                        "FOREIGN KEY (w_id) REFERENCES Wallet(w_id) ON DELETE CASCADE" +
                    ") ENGINE=InnoDB;"
            );


            // Insert values
            stmt.executeUpdate("INSERT INTO User VALUES ('gokiberk', 'gk@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Reader VALUES ('gokiberk', '0', '0', 'Goko Fav Quote');");

            stmt.executeUpdate("INSERT INTO User VALUES ('shanab', 'ass@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Reader VALUES ('shanab', '0', '0', 'Atas Fav Quote');");

            stmt.executeUpdate("INSERT INTO User VALUES ('sulo', 'sh@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Reader VALUES ('sulo', '0', '0', 'Sulo Fav Quote');");
            stmt.executeUpdate("INSERT INTO AuthorUser VALUES ('sulo');");

            stmt.executeUpdate("INSERT INTO User VALUES ('aydo', 'ay@x.com', 'pass');");
            stmt.executeUpdate("INSERT INTO Admin VALUES ('aydo');");

            stmt.executeUpdate("INSERT INTO Book VALUES ('1', 'Nutuk', 'YKY', '1927', 'Speech', '543');");
            stmt.executeUpdate("INSERT INTO Book VALUES ('2', 'Harry Potter', 'YKY', '1999', 'Fiction', '493');");

            stmt.executeUpdate("INSERT INTO Book VALUES ('3', 'MyBook', 'ME', '2022', 'Bio', '100');");
            stmt.executeUpdate("INSERT INTO E_Book VALUES ('3', '20');");

            stmt.executeUpdate("INSERT INTO Review VALUES ('1', 'Güzel kitap', '5')");

            stmt.executeUpdate("INSERT INTO has_review VALUES ('2', '1')");
            stmt.executeUpdate("INSERT INTO post VALUES ('gokiberk', '1')");
            //stmt.executeUpdate("INSERT INTO read VALUES ('sulo', '2')");

            stmt.executeUpdate("INSERT INTO Wallet VALUES ('1', '1000')");
            stmt.executeUpdate("INSERT INTO has_wallet VALUES ('gokiberk', '1')");



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
            rs = stmt.executeQuery("SELECT * FROM Book;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT * FROM Review;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT Book.title, Review.text, Review.rating FROM Book NATURAL JOIN has_review, Review;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT u.username, r.text FROM Review r, post p, Reader u WHERE r.r_id = p.r_id AND p.username = u.username;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            /* rs = stmt.executeQuery("SELECT u.username, b.title FROM Book b, read r, Reader u WHERE r.b_id = b.b_id AND r.username = u.username;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            } */
            rs = stmt.executeQuery("SELECT * FROM E_Book NATURAL JOIN Book;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT * FROM Wallet;");
            try {
                displayTable(rs);
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
            rs = stmt.executeQuery("SELECT r.username, w.balance FROM Wallet w, has_wallet h, Reader r WHERE h.w_id = w.w_id AND h.username = r.username;");
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
            System.out.printf("------------------- ");
        }
        System.out.println();
        for (int i = 1; i <= colNum; i++) { // prints the attribute names
            System.out.printf("%-20s", rsmd.getColumnLabel(i));
        }
        System.out.println();
        for (int i = 1; i <= colNum; i++) { // prints the seperator
            System.out.printf("------------------- ");
        }
        System.out.println();
        while (rs.next()) {
            for (int i = 1; i <= colNum; i++) { // prints the rows
                System.out.printf("%-20s", rs.getString(i));
            }
            System.out.println(); // next column
        }
        for (int i = 1; i <= colNum; i++) { // prints the seperator
            System.out.printf("------------------- ");
        }
        System.out.println();
        System.out.println();
    }
}