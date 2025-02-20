PAGES = index.html math.html tech.html
SHARED_DEPS = static/head.html side-nav.php

pages_fr = fr/accueil.html fr/recherche.html fr/enseigner.html fr/cv.html
shrd_deps_en = pg-array.php
shrd_deps_fr = fr/pg-array.php fr/static/lang-ver-anchor.html

.PHONY: all clean

all: $(PAGES)

%.html: static/%.html $(SHARED_DEPS)
	php -f page.php $* > $@

clean:
	-@rm -rf $(PAGES)
