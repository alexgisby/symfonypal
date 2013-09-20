Using Symfony2
======
What we struggled with
----
One of the devs couldn't set Apache+PHP working in the sandbox. We ended up using MAMP ( :'( ).

What we achieved
-------
- Home page with:
	- full categorised service listing  	
	- filters (no time to show)
- Schedule page
	- Times
	- Program title and image
- Episode page
	- Title
	Sinopsys
	Image	


What we liked about Symfony2
-------
- Integration with twig
- Feels pretty fast
- Debug bar in the bottom
- Asset management (Assetic)
- You're free to create your own folders and use them following the PSR-0 namespace
- Easy to divide an application in bundles

What we hated about Symfony2
-------
- No integrated KV caching
- Documentation is often verbose and unclear.
- Scattered config files
- Pretty heavy. We needed to increase the RAM limit to 128MB to get the meaningful debugging info

What we couldn't do
-----
- Have "preDispatch" method in a BaseController


