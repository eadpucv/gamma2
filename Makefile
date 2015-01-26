
.PHONY: css

install:
	bower install
	
css:
	lessc less/gamma-assembler.less css/gamma.css --clean-css

dist:
	cp -R bower_components/pyxis/js/ js
	cp bower_components/jquery/jquery.min.js js
	cp -R bower_components/pyxis/fonts/ fonts