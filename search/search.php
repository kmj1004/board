
    <form action="../main/index.php" method="post">
      <select name="select">
        <option value="search_user">작성자</option>
        <option value="search_title">제목</option>
        <option value="search_contents">내용</option>
      </select>
      <input type="text" name="search">
      <input type="hidden" value="<?=$_POST['select']?>">
      <input type="hidden" value="<?=$_POST['search']?>">
      <input type="submit" value="검색">
    </form>
