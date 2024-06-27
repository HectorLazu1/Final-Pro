<html>
<body>

    <div style="border: 5px solid black; padding: 10px; margin: 10px 0px">
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

    <div style="border: 5px solid black; padding: 10px">
        <form action="staff_checkout_book.php" method="post">

          <h2>Checkout a book for a patron</h2>
        	<span> 
        		Enter patron ID: <input type="text" name="checkout_id" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter book ISBN: <input type="text" name="checkout_ISBN" style="margin: 8px 2px">
        		<br>
        	</span>
        	
        	<span> 
        		<input type="submit" style="margin: 8px 2px">
        	</span>
        </form>
    </div>
    
    <div style="border: 5px solid black; padding: 10px; margin: 10px 0px">
        <form action="adding_book.php" method="post">

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
    
    <div style="border: 5px solid black; padding: 10px; margin: 10px 0px">
        <form action="deleting_book.php" method="post">

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
        <form action="staff_update_hold.php" method="post">

          <h2>Update a hold on a book to be for another patron</h2>
        	<span> 
        		Enter ISBN: <input type="text" name="updateHold" style="margin: 8px 2px">
        		<br>
        	</span>

            <span> 
        		Enter new PatronID: <input type="text" name="newID" style="margin: 8px 2px">
        		<br>
        	</span>
        	
        	<span> 
        		<input type="submit" style="margin: 8px 2px">
        	</span>
        </form>
    </div>

    <div style="border: 5px solid black; padding: 10px; margin: 10px 0px">
        <form action="staff_delete_hold.php" method="post">

          <h2>Remove a hold on a book</h2>
        	<span> 
        		Enter ISBN: <input type="text" name="deleteHold" style="margin: 8px 2px">
        		<br>
        	</span>
        	
        	<span> 
        		<input type="submit" style="margin: 8px 2px">
        	</span>
        </form>
    </div>

</body>
</html>

