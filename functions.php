				
<?php

	function cleanInput($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	
	
		//Bygg query som insert info i databasen table Creator
	function createCreator($conn, $creatorfirstname, $creatorlastname){
		$stmt_insertCreator = $conn->prepare("INSERT INTO table_creator (creator_firstname, creator_lastname) VALUES (:creatorfirstname, :creatorlastname)"); 
		$stmt_insertCreator->bindParam(':creatorfirstname', $creatorfirstname, PDO::PARAM_STR);
		$stmt_insertCreator->bindParam(':creatorlastname', $creatorlastname, PDO::PARAM_STR);
	    $stmt_insertCreator->execute();
	
		$insertedCreatorId = $conn->lastInsertId();
		return $insertedCreatorId;
	}
	
	
	   //Bygg query som insert info i databasen table Books
	 function createBook($conn, $title, $description, $author, $illustrator, $category, $genre, $series, $language, $year, $publisher, $age, $page, $price, $image, $bookstatus, $user, $lastId){
		$stmt_insertBook = $conn->prepare("INSERT INTO table_books (book_title, book_description, author_fk, illustrator_fk, category_fk, genre_fk, series_fk, language_fk, book_year, publisher_fk, age_fk, book_page, book_price, book_picture, bookstatus_fk, user_fk, creator_fk)  
		VALUES (:title, :description, :author, :illustrator, :category, :genre, :series, :language, :year, :publisher, :age, :page, :price, :image, :bookstatus, :user, :lastId)"); 
		$stmt_insertBook->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':author', $author, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':illustrator', $illustrator, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':category', $category, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':genre', $genre, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':series', $series, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':language', $language, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':year', $year, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':publisher', $publisher, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':age', $age, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':page', $page, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':price', $price, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':image', $image, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':bookstatus', $bookstatus, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':user', $user, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':lastId', $lastId, PDO::PARAM_STR);
	    $stmt_insertBook->execute();
}		

//Bygg query som insert info och update i databasen table Creator
function updateCreator($conn, $creatorfirstname, $creatorlastname, $cid){
		$stmt_insertCreator = $conn->prepare("UPDATE table_creator
        SET creator_firstname = :creatorfirstname, creator_lastname = :creatorlastname WHERE creator_id = :cid "); 
		$stmt_insertCreator->bindParam(':creatorfirstname', $creatorfirstname, PDO::PARAM_STR);
		$stmt_insertCreator->bindParam(':creatorlastname', $creatorlastname, PDO::PARAM_STR);
		$stmt_insertCreator->bindParam(':cid', $cid, PDO::PARAM_INT);
	    $stmt_insertCreator->execute();
		echo "hej updateCreator";	
}
	
//Bygg query som insert info och update i databasen table Books
function updateBook($conn, $title, $description, $author, $illustrator, $category, $genre, $series, $language, $year, $publisher, $age, $page, $price, $image, $bookstatus, $user, $bid){
		$stmt_insertBook = $conn->prepare("UPDATE table_books
		SET book_title = :title, book_description = :description, author_fk = :author, illustrator_fk = :illustrator, category_fk =:category, genre_fk = :genre, series_fk = :series, language_fk = :language, book_year = :year, publisher_fk = :publisher, age_fk = :age, book_page = :page, book_price = :price, book_picture = :image, bookstatus_fk = :bookstatus, user_fk = :user WHERE book_id = :bid"); 
		$stmt_insertBook->bindParam(':title', $title, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':author', $author, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':illustrator', $illustrator, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':category', $category, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':genre', $genre, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':series', $series, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':language', $language, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':year', $year, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':publisher', $publisher, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':age', $age, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':page', $page, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':price', $price, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':image', $image, PDO::PARAM_STR);
		$stmt_insertBook->bindParam(':bookstatus', $bookstatus, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':user', $user, PDO::PARAM_INT);
		$stmt_insertBook->bindParam(':bid', $bid, PDO::PARAM_INT);
	    $stmt_insertBook->execute();
		echo "hej updateBook";

}		

//Bygg query som insert info i databasen table Author
function createAuthor($conn, $afirstname, $alastname){
		$stmt_insertAuthor = $conn->prepare("INSERT INTO table_author (author_firstname, author_lastname) VALUES (:afirstname, :alastname)"); 
		$stmt_insertAuthor->bindParam(':afirstname', $afirstname, PDO::PARAM_STR);
		$stmt_insertAuthor->bindParam(':alastname', $alastname, PDO::PARAM_STR);
	    $stmt_insertAuthor->execute();
}	
//Bygg query som insert info i databasen table Illustrator
function createIllustrator($conn, $ifirstname, $ilastname){
		$stmt_insertIllustrator = $conn->prepare("INSERT INTO table_illustrator (illustrator_firstname, illustrator_lastname) VALUES (:ifirstname, :ilastname)"); 
		$stmt_insertIllustrator->bindParam(':ifirstname', $ifirstname, PDO::PARAM_STR);
		$stmt_insertIllustrator->bindParam(':ilastname', $ilastname, PDO::PARAM_STR);
	    $stmt_insertIllustrator->execute();
}	
//Bygg query som insert info i databasen table Category
function createCategory($conn, $cname){
		$stmt_insertCategory = $conn->prepare("INSERT INTO table_category (category_name) VALUES (:cname)"); 
		$stmt_insertCategory->bindParam(':cname', $cname, PDO::PARAM_STR);
	    $stmt_insertCategory->execute();
}

//Bygg query som insert info i databasen table Genre
function createGenre($conn, $gname, $gform){
		$stmt_insertGenre = $conn->prepare("INSERT INTO table_genre (genre_name, genre_form) VALUES (:gname, :gform)"); 
		$stmt_insertGenre->bindParam(':gname', $gname, PDO::PARAM_STR);
		$stmt_insertGenre->bindParam(':gform', $gform, PDO::PARAM_STR);
	    $stmt_insertGenre->execute();
}

function createSeries($conn, $sname, $snumber){
		$stmt_insertSeries = $conn->prepare("INSERT INTO table_series (series_name, series_number) VALUES (:sname, :snumber)"); 
		$stmt_insertSeries->bindParam(':sname', $sname, PDO::PARAM_STR);
		$stmt_insertSeries->bindParam(':snumber', $snumber, PDO::PARAM_STR);
	    $stmt_insertSeries->execute();
}

function createLanguage($conn, $lname, $lgroup){
		$stmt_insertLanguage = $conn->prepare("INSERT INTO table_language (language_name, language_group) VALUES (:lname, :lgroup)"); 
		$stmt_insertLanguage->bindParam(':lname', $lname, PDO::PARAM_STR);
		$stmt_insertLanguage->bindParam(':lgroup', $lgroup, PDO::PARAM_STR);
	    $stmt_insertLanguage->execute();
}

function createPublisher($conn, $pfirstname, $plastname){
		$stmt_insertPublisher = $conn->prepare("INSERT INTO table_publisher (publisher_firstname, publisher_lastname) VALUES (:pfirstname, :plastname)"); 
		$stmt_insertPublisher->bindParam(':pfirstname', $pfirstname, PDO::PARAM_STR);
		$stmt_insertPublisher->bindParam(':plastname', $plastname, PDO::PARAM_STR);
	    $stmt_insertPublisher->execute();
}

function createAge($conn, $ageinterval){
		$stmt_insertAge = $conn->prepare("INSERT INTO table_age (age_interval) VALUES (:ageinterval)"); 
		$stmt_insertAge->bindParam(':ageinterval', $ageinterval, PDO::PARAM_STR);
	    $stmt_insertAge->execute();
}



//Bygg query som hämtar ut alla rader ur databasen ifall bookstatus active
function selectBooks ($conn, $amount){
	$amount = intval ($amount);
	$selectedBooks = $conn->prepare(
	"SELECT *
     FROM table_books
     INNER JOIN table_creator
	 ON table_books.creator_fk = table_creator.creator_id 
	 INNER JOIN table_age
	 ON table_books.age_fk = table_age.age_id 
	 INNER JOIN table_author
	 ON table_books.author_fk = table_author.author_id 
	 INNER JOIN table_language
	 ON table_books.language_fk = table_language.language_id
     INNER JOIN table_illustrator
	 ON table_books.illustrator_fk = table_illustrator.illustrator_id 
     INNER JOIN table_category
	 ON table_books.category_fk = table_category.category_id 	
     INNER JOIN table_genre
	 ON table_books.genre_fk = table_genre.genre_id 				 
	 WHERE bookstatus_fk = 1
	 LIMIT :amount"
	 );
	$selectedBooks->bindParam(':amount', $amount, PDO::PARAM_INT);
	$selectedBooks->execute();
	return $selectedBooks;   
}



//Bygg query som hämtar ut de tre sista raderna ur databasen 
function selectLastBooks ($conn){
	$selectedLastBooks = $conn->prepare(
	"SELECT *
     FROM table_books 
     INNER JOIN table_creator
	 ON table_books.creator_fk = table_creator.creator_id 
	 INNER JOIN table_age
	 ON table_books.age_fk = table_age.age_id 
	 INNER JOIN table_author
	 ON table_books.author_fk = table_author.author_id 
	 INNER JOIN table_language
	 ON table_books.language_fk = table_language.language_id
     INNER JOIN table_illustrator
	 ON table_books.illustrator_fk = table_illustrator.illustrator_id 
     INNER JOIN table_category
	 ON table_books.category_fk = table_category.category_id 	
     INNER JOIN table_genre
	 ON table_books.genre_fk = table_genre.genre_id 
     ORDER BY book_id DESC LIMIT 3" 	 
	 );
	$selectedLastBooks->execute();
	return $selectedLastBooks;   
    }



 function fetchAuthor($conn){
		$selectedAuthor = $conn->query("SELECT * FROM table_author");
	    return $selectedAuthor;
	}
		
 function fetchIllustrator($conn){
		$selectedIllustrator = $conn->query("SELECT * FROM table_illustrator");
	    return $selectedIllustrator;
	}
	
	 function fetchCategory($conn){
		$selectedCategory = $conn->query("SELECT * FROM table_category");
	    return $selectedCategory;
	}

	 function fetchGenre($conn){
		$selectedGenre = $conn->query("SELECT * FROM table_genre");
	    return $selectedGenre;
	}
	
		 function fetchSeries($conn){
		$selectedSeries = $conn->query("SELECT * FROM table_series");
	    return $selectedSeries;
	}
	
	 function fetchLanguage($conn){
		$selectedLanguage = $conn->query("SELECT * FROM table_language");
	    return $selectedLanguage;
	}
	
		
 function fetchPublisher($conn){
		$selectedPublisher = $conn->query("SELECT * FROM table_publisher");
	    return $selectedPublisher;
	}


 function fetchAge($conn){
		$selectedAge = $conn->query("SELECT * FROM table_age");
	    return $selectedAge;
	}


//Radera en rad ur databasen/ändra bookstatus inactive
function deleteBook($conn, $book){
		$deletedBookQuery = $conn->prepare(
		"UPDATE table_books 
		 SET bookstatus_fk = 3
		 WHERE book_id = :bid"
		 );
	  $deletedBookQuery->bindParam(':bid', $book, PDO::PARAM_INT);
	  $deletedBookQuery->execute();
	  return true;
	}
	
	
	
//Bygg query som hämtar ut en rad ur databasen
function selectSingleBook($conn, $id){
		$selectedBook = $conn->prepare(
		'SELECT *
		 FROM table_books
		 INNER JOIN table_creator
		 ON table_books.creator_fk = table_creator.creator_id 
		 INNER JOIN table_age
		 ON table_books.age_fk = table_age.age_id 
		 INNER JOIN table_author
		 ON table_books.author_fk = table_author.author_id 
		 INNER JOIN table_language
	     ON table_books.language_fk = table_language.language_id
         INNER JOIN table_illustrator
	     ON table_books.illustrator_fk = table_illustrator.illustrator_id 
         INNER JOIN table_category
	     ON table_books.category_fk = table_category.category_id 	
         INNER JOIN table_genre
	     ON table_books.genre_fk = table_genre.genre_id 				 
		 WHERE book_id = :id'
		 );
	  $selectedBook->bindParam(':id', $id, PDO::PARAM_INT);
	  $selectedBook->execute();
	  $bookData=$selectedBook->fetch();
	  
	  return $bookData;
	  	echo "hej bookData";
	}
	
	
//Bygg query som search en rad/rader ur databasen
function searchBooks($conn){
			$cleanSearchParam = cleanInput($_POST['search_bookname']);
			$cleanSearchParam = "%".$cleanSearchParam."%";
			$searchBooksQuery = $conn->prepare("SELECT * FROM table_books
		 INNER JOIN table_creator
		 ON table_books.creator_fk = table_creator.creator_id 
		 INNER JOIN table_age
		 ON table_books.age_fk = table_age.age_id 
		 INNER JOIN table_author
		 ON table_books.author_fk = table_author.author_id 
		 INNER JOIN table_language
	     ON table_books.language_fk = table_language.language_id
         INNER JOIN table_illustrator
	     ON table_books.illustrator_fk = table_illustrator.illustrator_id 
		 INNER JOIN table_publisher
		 ON table_books.publisher_fk = table_publisher.publisher_id 
         INNER JOIN table_category
	     ON table_books.category_fk = table_category.category_id 	
         INNER JOIN table_genre
	     ON table_books.genre_fk = table_genre.genre_id 			
			WHERE book_title LIKE :searchParam
			OR author_firstname LIKE :searchParam2
			OR author_lastname LIKE :searchParam3
			OR illustrator_firstname LIKE :searchParam4
			OR illustrator_lastname LIKE :searchParam5
			OR publisher_firstname LIKE :searchParam6
			OR publisher_lastname LIKE :searchParam7
			OR book_page LIKE :searchParam8
			OR language_name LIKE :searchParam9
			OR genre_name LIKE :searchParam10
			OR genre_form LIKE :searchParam11
			OR category_name LIKE :searchParam12
			OR age_interval LIKE :searchParam13
			OR book_price LIKE :searchParam14
			OR book_year LIKE :searchParam15
			");
			$searchBooksQuery->bindParam(":searchParam", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam2", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam3", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam4", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam5", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam6", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam7", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam8", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam9", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam10", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam11", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam12", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam13", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam14", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->bindParam(":searchParam15", $cleanSearchParam, PDO::PARAM_STR);
			$searchBooksQuery->execute();
			return $searchBooksQuery;	
		}
		
//Bygg query som hämtar ut alla rader ur databasen table Category with amount
    function selectCategory ($conn, $amount){
	$amount = intval ($amount);
	$selectedCategory = $conn->prepare(
	"SELECT *
     FROM table_category
	 LIMIT :amount"
	 );
	$selectedCategory->bindParam(':amount', $amount, PDO::PARAM_INT);
	$selectedCategory->execute();
	return $selectedCategory;   
}


// Bygg query som hämtar ut alla rader ur databasen table Category for filter
 function selectAllCategory ($conn){
		$allBookCategory = $conn->query("SELECT DISTINCT category_name FROM table_category");
	    return $allBookCategory;
	}



// Bygg query som hämtar ut Category name ur databasen with filter
function selectFilteredBooks ($conn, $filterCriteria, $column){
	$sql_query = 'SELECT *
     FROM table_books
         INNER JOIN table_creator
		 ON table_books.creator_fk = table_creator.creator_id 
		 INNER JOIN table_age
		 ON table_books.age_fk = table_age.age_id 
		 INNER JOIN table_author
		 ON table_books.author_fk = table_author.author_id 
		 INNER JOIN table_language
	     ON table_books.language_fk = table_language.language_id
         INNER JOIN table_illustrator
	     ON table_books.illustrator_fk = table_illustrator.illustrator_id 
		 INNER JOIN table_publisher
		 ON table_books.publisher_fk = table_publisher.publisher_id 
         INNER JOIN table_category
	     ON table_books.category_fk = table_category.category_id 	
         INNER JOIN table_genre
	     ON table_books.genre_fk = table_genre.genre_id 		
	 WHERE '; 
	 if($column == "category_name") {
		 $sql_query .= "category_name";
	}
	$sql_query .= " = :filter";
	$selectedBooks = $conn->prepare($sql_query);
	$selectedBooks->bindParam(':filter', $filterCriteria, PDO::PARAM_STR);
	$selectedBooks->execute();
	return $selectedBooks;   
	}



//Bygg query som insert reviews i databasen 
	function createRaitingMark($conn, $prod, $raiting){
		$stmt_insertRaitingMark = $conn->prepare("INSERT INTO table_reviews (book_fk, raiting) VALUES (:prod, :raiting)");
        $stmt_insertRaitingMark->bindParam(':prod', $prod, PDO::PARAM_STR);		
		$stmt_insertRaitingMark->bindParam(':raiting', $raiting, PDO::PARAM_STR);
	    $stmt_insertRaitingMark->execute();
}



//
 function selectFastRaitingMark ($conn){
		$allFastRaitingMark = $conn->query("SELECT *, count(*) c FROM table_reviews
		 INNER JOIN table_books
		 ON table_reviews.book_fk = table_books.book_id
		 GROUP BY raiting ORDER BY c DESC LIMIT 3
		");
	    return $allFastRaitingMark;
	}





/*
//Bygg query som search en rad/rader ur databasen
function searchCategory($conn){
			$searchCategoryQuery = $conn->prepare("SELECT * FROM table_books
		 INNER JOIN table_creator
		 ON table_books.creator_fk = table_creator.creator_id 
		 INNER JOIN table_age
		 ON table_books.age_fk = table_age.age_id 
		 INNER JOIN table_author
		 ON table_books.author_fk = table_author.author_id 
		 INNER JOIN table_language
	     ON table_books.language_fk = table_language.language_id
         INNER JOIN table_illustrator
	     ON table_books.illustrator_fk = table_illustrator.illustrator_id 
		 INNER JOIN table_publisher
		 ON table_books.publisher_fk = table_publisher.publisher_id 
         INNER JOIN table_category
	     ON table_books.category_fk = table_category.category_id 	
         INNER JOIN table_genre
	     ON table_books.genre_fk = table_genre.genre_id 			
			WHERE book_category LIKE :searchParam
			");
			$searchCategoryQuery->bindParam(":searchParam", $cleanSearchParam, PDO::PARAM_STR);
			$searchCategoryQuery->execute();
			return $searchCategoryQuery;	
		}











/*

function selectCategoryy ($conn){
	$selectedCategoryy = $conn->prepare(
	"SELECT category_fk,
	 COUNT(category_fk) AS 'value_occurrence'
     FROM table_books 
     
     INNER JOIN table_category
	 ON table_books.category_fk = table_category.category_id 	
     GROUP BY category_fk
	 ORDER BY 'value_occurrence' DESC LIMIT 3" 	 
	 );
	$selectedCategoryy->execute();
	return $selectedCategoryy;   
    }
	
*/	





?>