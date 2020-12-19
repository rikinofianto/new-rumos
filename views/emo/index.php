<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 id="title-emo"></h1>

        <p class="lead">
            <div class="row">
                <span class="col-xs-6" style="text-align: left; cursor: pointer;" data-toggle="collapse" data-target="#content-emo">Lihat konten</span>
                <span class="col-xs-6 next-article" style="text-align: right; cursor: pointer;" data-article-id="">Lewati</span>
            </div>
        </p>
        <hr>
        <p id="content-emo" class="collapse"></p>
        <p class="response-buttons">
            <?php
            if (!empty($positive)) {
                foreach ($positive as $key => $posbtn) {
                    echo Html::a($posbtn->title, null, [
                        'href' => 'javascript:void(0);',
                        'class' => 'btn btn-success btn-positive btn-response',
                        'style' => 'margin:1px;',
                        'data-id' => $posbtn->id
                    ]);
                }
            }
            ?>
        </p>
        <p class="response-buttons">
            <?php
            if (!empty($negative)) {
                foreach ($negative as $key => $negbtn) {
                    echo Html::a($negbtn->title, null, [
                        'href' => 'javascript:void(0);',
                        'class' => 'btn btn-danger btn-negative btn-response',
                        'style' => 'margin:1px;',
                        'data-id' => $negbtn->id
                    ]);
                }
            }
            ?>
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h3>Positive</h3>

                <ul class="list-group positive-list">
                </ul>
            </div>
            <div class="col-lg-6">
                <h3>Negative</h3>

                <ul class="list-group negative-list">
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="wordsModal" tabindex="-1" role="dialog" aria-labelledby="wordsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="wordsModalLabel">Pilih kata kunci negatif</h5>
      </div>
      <div class="modal-body" id="negative-words">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save-response">Save</button>
      </div>
    </div>
  </div>
</div>
<?php

$this->registerJs(
      "
      $(document).ready(function(){
        loadArticle();
        getResponse();
      });

      $('.next-article').on('click', function() {
        loadNextArticle();
      });

      $('.btn-response').on('click', function() {
        var title = $('#title-emo').text();
        var id_component = $(this).attr('data-id');
        var id_article = $(this).attr('data-id-article');

        /*kalo responnya negatif*/
        if ($(this).hasClass('btn-negative')) {
          chooseWord();
        } else {
          $.post( '".Yii::$app->urlManager->createUrl('emo/response')."', {id_component: id_component, id_article: id_article}, function(data) {
            var resp = JSON.parse(data);
            if (resp.success == 1) {
              $('ul.positive-list').append('<li class=\'list-group-item\' data-id=>'+title+'</li>');
              $('.next-article').trigger('click');
            }
          });
        }

        $('.save-response').on('click', function(e) {
          e.preventDefault();
          var kata = [];
          $('.word-list').each(function(i) {
            var wrd = $(this);
            if (wrd.hasClass('label-primary')) {
              kata.push(wrd.text());
            }
          });
          console.log(kata);
          if (kata.length > 0) {
            /*ajax save negative response*/
            $.post( '".Yii::$app->urlManager->createUrl('emo/response')."', {words: kata, id_component: id_component, id_article: id_article}, function(data) {
              var resp = JSON.parse(data);
              if (resp.success == 1) {
                $('ul.negative-list').append('<li class=\'list-group-item\' data-id=>'+title+'</li>');
                kata = [];
              }
            });
            $('#wordsModal').modal('hide');
            $('.next-article').trigger('click');
            $(this).prop('disabled', true);
          }
        });
      });

      function loadArticle() {
        $.get( '".Yii::$app->urlManager->createUrl('emo/article')."' , function(data) {
          var content = JSON.parse(data);
          if (content.code == '1') {
            $('#title-emo').html(content.article.title);
            $('#content-emo').html(content.article.content);
            $('.next-article').attr('data-article-id', content.article.id);
            $('.btn-response').attr('data-id-article', content.article.id);
          } else {
            $('#title-emo').html('data not found!');
            $('.response-buttons').hide();
          }
        });
      }

      function loadNextArticle() {
        var idArticle = $('.next-article').attr('data-article-id');
        $.get( '".Yii::$app->urlManager->createUrl('emo/next-article?id=')."' + idArticle, function(data) {
          if (data) {
            var content = JSON.parse(data);
            if (content.code == '1') {
              $('#title-emo').html(content.article.title);
              $('#content-emo').html(content.article.content);
              $('.next-article').attr('data-article-id', content.article.id);
              $('.btn-response').attr('data-id-article', content.article.id);
            } else {
              $('#title-emo').html('data not found!');
              $('#content-emo').html('reload page to start over again');
              $('.response-buttons').hide();
            }
          }
        });
      }

      function chooseWord() {
        var title = $('#title-emo').text();
        var words = title.split(' ');
        if (words) {
          str = '';
          $.each(words, function(i) {
            str += '<span class=\'label label-default word-list\' style=\'cursor: pointer;\'>'+ words[i] +'</span> ';
          });
          $('#negative-words').html(str);
          $('.word-list').on('click', function() {
            if ($(this).hasClass('label-default')) {
              $(this).removeClass('label-default');
              $(this).addClass('label-primary');
            } else {
              $(this).removeClass('label-primary');
              $(this).addClass('label-default');
            }
          });
        }
        $('#wordsModal').modal()
      }

      function getResponse(type = null) {
        $.get( '".Yii::$app->urlManager->createUrl('emo/get-response')."', function(data) {
          if (data) {
            var response = JSON.parse(data);
            if (response.positive) {
              $.each(response.positive, function(i) {
                $('ul.positive-list').append('<li class=\'list-group-item\' data-id='+response.positive[i].id+'>'+response.positive[i].title+'</li>');
              })
            }

            if (response.negative) {
              $.each(response.negative, function(i) {
                $('ul.negative-list').append('<li class=\'list-group-item\' data-id='+response.negative[i].id+'>'+response.negative[i].title+'</li>');
              })
            }

          }
        });
      }
      ",
       \yii\web\View::POS_END,
      'rumos-response'
  );