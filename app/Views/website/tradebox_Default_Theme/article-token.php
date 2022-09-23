<div class="row mt-5 mb-5">
  <div class="col-10 offset-md-1">
    <div class="d-flex">
      <div style="width: 20%">
        <img src="<?php echo base_url("public/".$article->article_image); ?>" class="img-thumbnail" alt="Cinque Terre" style="object-fit: fill; max-width: 150px">
      </div>
      <div style="width: 70%" class="ml-5">
        <p class="text-white font-weight-bold" style="font-size: 22px"><?php echo esc(isset($lang)) && $lang =="french" ? $article->headline_fr : $article->headline_en; ?></p>
        <div class="text-white" style="color: white"><?php if (isset($lang) && $lang =="french") { echo htmlspecialchars_decode($article->article1_fr); } else { echo htmlspecialchars_decode($article->article1_en); } ?></div>
      </div>
    </div>
  </div>
</div>