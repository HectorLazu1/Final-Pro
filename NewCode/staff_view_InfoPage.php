<html>
<body>

    <div style="border: 5px solid black; padding: 10px">
        <form action="staff_show_book_info.php" method="post">

          <h2>Enter type of info desired ("loans" or "holds").</h2>
          <h3>Lowercase only.</h3>
        	<span> 
        		Enter info type: <input type="text" name="infoType" style="margin: 8px 2px">
        		<br>
        	</span>
        	
        	<span> 
        		<input type="submit" style="margin: 8px 2px">
        	</span>
        </form>
    </div>

    <div style="border: 5px solid black; padding: 10px; margin: 10px 0px">
        <form action="staff_delete_book.php" method="post">

          <h2>Remove books from catalog</h2>
        	<span> 
        		Enter ISBN: <input type="text" name="deleteISBN" style="margin: 8px 2px">
        		<br>
        	</span>
        	
        	<span> 
        		<input type="submit" style="margin: 8px 2px">
        	</span>
        </form>
    </div>

    <div style="border: 5px solid black; padding: 10px; margin: 10px 0px">
        <form action="staff_add_book.php" method="post">

          <h2>Add books to catalog</h2>
        	<span> 
        		Enter ISBN of new book: <input type="text" name="addISBN" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter title of new book: <input type="text" name="add_title" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter author of new book: <input type="text" name="add_author" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter edition of new book: <input type="text" name="add_edition" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter publisher of new book: <input type="text" name="add_publisher" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter publication year of new book: <input type="text" name="add_year" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter call number of new book: <input type="text" name="add_call_number" style="margin: 8px 2px">
        		<br>
        	</span>
        	
        	<span> 
        		<input type="submit" style="margin: 8px 2px">
        	</span>
        </form>
    </div>

</body>
</html>

