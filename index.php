<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cari Minuman</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Minuman Berdasarkan Kategori</h1>
    <form method="get">
      <select name="category">
        <option value="">Pilih Kategori</option>
        <option value="Ordinary Drink">Minuman Biasa</option>
        <option value="Cocktail">Koktail</option>
        <option value="Milk">Susu</option>
        <option value="Other/Unknown">Lainnya</option>
      </select>
      <button type="submit">Cari</button>
    </form>
    <?php
      if(isset($_GET['category'])) {
        $category = $_GET['category'];
        $url = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=".$category;
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        if($data['drinks']) {
          echo "<ul>";
          foreach($data['drinks'] as $drink) {
            echo "<li>";
            echo "<img src='".$drink['strDrinkThumb']."' alt='".$drink['strDrink']."'>";
            echo "<h3>".$drink['strDrink']."</h3>";
            echo "<p>".$drink['strCategory']."</p>";
            echo "</li>";
          }
          echo "</ul>";
        } else {
          echo "<p>Tidak ada minuman ditemukan dalam kategori ini.</p>";
        }
      }
    ?>
  </div>
</body>
</html>

