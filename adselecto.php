 <?php if ( !is_front_page() ) : ?>
<?php
// Verifica se a primeira visualização já foi registrada
$firstPageView = !isset($_COOKIE['isFirstPageview']);
if ($firstPageView) {
    // Define o cookie para a primeira visualização
    setcookie('isFirstPageview', 'true', [
        'expires' => time() + 86400, // Cookie expira em 1 dia
        'path' => '/',
        'secure' => true, // Defina como true se estiver usando HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
}
?>
<script type="module">
import "https://cdn.cloud.adseleto.com/dev/plugins/faux-drift.min.js";
import "https://cdn.cloud.adseleto.com/dev/plugins/auto-custom-targets.min.js";
import AdseletoWrapper from "https://cdn.cloud.adseleto.com/dev/adseleto-wrapper.min.js";

window.wrapper = new AdseletoWrapper({
  config: {
    gam_id: "23082373384",
    domain_id: "as_extraduda",
    refresh: {
      max_times: 10,
      interval: 30,
      smart_refresh: true
    },
    lazy_load: {
      fetch_margin_percent: 100,
      mobile_scaling: 1.0
    },
    ad_insert: {
      <?php if ($firstPageView) : ?>
      offerwall: {
        position: 'rewarded',
        page_views: 0,
        customization: {
          title: 'Desbloquea tu recomendación',
          subtitle: 'Toma medidas para continuar accediendo a tu recomendación en este sitio.',
          cta: 'Desbloquear oferta',
          footnote: 'Ver un anuncio corto',
          style: {
            font: 'Poppins'
          }
        }
      },
      <?php endif; ?>
      automatic_insertion: [
        {
          ref: "#post-11309, .nv-content-wrap",
          position: "content",
          after_paragraph: 1,
          ignore_tags_near: true,
          exclude_from: ["/", "/category/*", "/termos-de-uso/", "/politicas-de-privacidade/"]
        }
      ],
      insert_after: [
        {
          ref: ".elementor-heading-title, .nv-title-meta-wrap, .entry-title",
          position: "top",
          exclude_from: ["/", "/category/*", "/termos-de-uso/", "/politicas-de-privacidade/"]
        }
      ],
      interstitial: {
        device: ["desk", "mob"],
        exclude_from: ["/termos-de-uso/", "/politicas-de-privacidade/"]
      }
    }
  },
  plugins: {
    "auto-custom-targets": true
  }
});
</script>
<?php endif; ?>
