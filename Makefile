quicksave:
	@git commit -a -m 'Save'
	@git push

save:
	@git add .
	@git commit
	@git push