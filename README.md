This is a PHP server application. It's scope is to render the values of a Document made out of a Templates. Each Template is made out of strings of words and Keywords. Keywords are sentances/words, but a Template
 can have a Keywords to not have to write the whole sentance, instead calling the specific Keyword like ex: {{Keyword1}} where Keyword1 is actually 'Hello!'.

The application is made out of a home page where Keywords, Templates and Documents can be added. Templates ca withing their text box the specific Keywords they need, but Documents add a list separated by ',' of t
he ids of the Templates.

There is an AJAX javascript function that automatically searches for Documents containing the value inside the seachbox. The founded values will, on click, redirect to the render page.

Inside the render page the Templates of the clicked Document are rendered, but instead of their actual value, if they have a specific Keyword it's value is shown not it's tag.
