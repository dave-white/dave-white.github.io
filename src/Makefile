cwd = $(PWD)

pages_en = index.html research.html teaching.html cv.html

pages_fr = fr/accueil.html fr/recherche.html fr/enseigner.html fr/cv.html

shrd_deps = head.html side-nav.php

shrd_deps_en = pg-array.php lang-ver-anchor.html

shrd_deps_fr = fr/pg-array.php fr/lang-ver-anchor.html

.PHONY: all

all: pages_all

install: pages_all
	cp index.html ../
	cp research.html ../
	cp teaching.html ../
	cp cv.html ../
	cp fr/accueil.html ../fr/
	cp fr/recherche.html ../fr/
	cp fr/enseigner.html ../fr/
	cp fr/cv.html ../fr/

pages_all: $(pages_en) $(pages_fr)

$(pages_en): %.html: %.php $(shrd_deps) $(shrd_deps_en)
	php -f $*.php > $@

$(pages_fr): fr/%.html: fr/%.php $(shrd_deps) $(shrd_deps_fr)
	cd fr; \
	php -f $*.php > $*.html;

$(shrd_deps) $(shrd_deps_en) $(shrd_deps_fr):
	touch $@

clean:
	rm $(pages_en) $(pages_fr)

