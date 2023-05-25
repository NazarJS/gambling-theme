<?php
$apIcon = get_field('apIcon');
$apText = get_field('apText');
$apTitle = get_field('apTitle');
$apCode = get_field('apCode');
$apButton = get_field('apButton');
$apCardStyle= get_field('apCardStyle');
$apEmodji = get_field('apEmodji');

$classString='';
if ( !empty($apCardStyle) ) {
  $classString="card-style-block";
}
echo acf_block_before('Secret block', $is_preview);

if ($apIcon) {
  $icon_image = 'style="background-image:url(' . wp_get_attachment_url($apIcon, 'medium') . ')"';
}
?>
  <div class="secret-box <?=$classString?>">
    <div class="secret-icon" <?= $icon_image ?> ><?=$apEmodji;?></div>
    <div class="secret-content">
      <div class="secret-title"><?= $apTitle ?></div>
      <div class="secret-text"><?= $apText ?>
      </div>
      <div class="secret-footer">
        <?php if (!empty($apCode)): ?>
          <div class="promocode"><input type="text" id="copyPromoTarget" value="<?= $apCode ?>" readonly=""><span
                    id="copyPromoToBuffer" class="copy"></span></div>
        <?php endif; ?>
        <?php
        if (!empty($apButton)):
          $link_url = $apButton['url'];
          $link_title = $apButton['title'];
          $link_target = $apButton['target'] ? $apButton['target'] : '_self';
          $link_title = !empty($link_title) ? $link_title : 'Get Promo';
          ?>
          <?= get_button($link_url, $link_title, 'link-button btn btn-with-back link-button promocode-btn', 'nofollow sponsored', true); ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
<?php if(!empty($apCode)):?>
  <script>
      document.querySelector('#copyPromoToBuffer').addEventListener("click", function () {
          document.querySelector("#copyPromoTarget").disabled = false;
          copyToClipboard(document.querySelector("#copyPromoTarget"));
          document.querySelector("#copyPromoTarget").disabled = true;
      });

      function copyToClipboard(elem) {
          // create hidden text element, if it doesn't already exist
          document.querySelector("#copyPromoTarget").classList.add("animated");
          var targetId = "_hiddenCopyText_";
          var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
          var origSelectionStart, origSelectionEnd;
          if (isInput) {
              // can just use the original source element for the selection and copy
              target = elem;
              origSelectionStart = elem.selectionStart;
              origSelectionEnd = elem.selectionEnd;
          } else {
              // must use a temporary form element for the selection and copy
              target = document.getElementById(targetId);
              if (!target) {
                  var target = document.createElement("textarea");
                  target.style.position = "absolute";
                  target.style.left = "-9999px";
                  target.style.top = "0";
                  target.id = targetId;
                  document.body.appendChild(target);
              }
              target.textContent = elem.textContent;
          }
          // select the content
          var currentFocus = document.activeElement;
          target.focus();
          target.setSelectionRange(0, target.value.length);

          // copy the selection
          var succeed;
          try {
              succeed = document.execCommand("copy");

          } catch (e) {
              succeed = false;
          }
          // restore original focus
          if (currentFocus && typeof currentFocus.focus === "function") {
              currentFocus.focus();
          }

          if (isInput) {
              // restore prior selection
              elem.setSelectionRange(origSelectionStart, origSelectionEnd);
          } else {
              // clear temporary content
              target.textContent = "";
          }

          setTimeout(function () {
              document.querySelector("#copyTarget").classList.remove('animated');
          }, 1000)
      }
  </script>
  <style>
      .animated {
          transform: scale(1);
          animation: pulse 0.7s ease-in-out;
      }

      @keyframes pulse {
          from {
              transform: scale(1);
              opacity: 1;

          }
          25% {
              transform: scale(1.1);
              opacity: 0.5;
          }
          50% {
              transform: scale(1);
              opacity: 1;
          }
          75% {
              transform: scale(1.1);
              opacity: 0.5;
          }
          100% {
              transform: scale(1);
              opacity: 1;
          }
      }
  </style>
<?php endif;?>



<?php
echo acf_block_after($is_preview);