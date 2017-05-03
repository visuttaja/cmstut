<?php
echo anchor($news_archive_link,'+ Uutisarkisto');
//$articles = array_slice($articles,3);
echo article_links($recent_news);
