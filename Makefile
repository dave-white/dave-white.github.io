pages = index.html math.html tech.html

pages_fr = fr/accueil.html fr/recherche.html fr/enseigner.html fr/cv.html

shrd_deps = static/head.html side-nav.php

shrd_deps_en = pg-array.php static/lang-ver-anchor.html

shrd_deps_fr = fr/pg-array.php fr/static/lang-ver-anchor.html

.PHONY: all clean

all: $(pages)

%.html: static/%.html
	php -f page.php $* > $@

clean:
	-@rm -rf $(pages) $(pages_fr)
