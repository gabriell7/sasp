<!----
SQL- harjoitus 2
-->

<p>1.
<pre>
SELECT * FROM Customers;
</pre>

<p>2. Suomalaiset asiakkaat
<pre>
SELECT * FROM Customers WHERE COUNTRY = "fINLAND"
</p>

<p>3. 
<pre>
SELECT * FROM Customers WHERE COUNTRY = "france" and City = "Marseille"
</pre>

<p>4.
<pre>
SELECT customername, address FROM Customers WHERE country = 'France' and city = 'Marseille'

</pre>

<p>5.
<pre>
INSERT INTO Customers (CustomerName, ContactName, Address, City, Country) VALUES ("Tredukauppa", "Uuno Turhapuro", "Hepolamminkatu 10", "Tampere", "Suomi") 

</pre>

<p>6.
<pre>
UPDATE Customers SET ContactName="Uolevi Nikander" WHERE ContactName="Uuno Turhapuro" 
</pre>

<p>7.
<pre>
SELECT ProductID FROM OrderDetails WHERE OrderID=10252 
</pre>


<p>9. 
<pre> 

S SELECT ContactName, Address FROM Customers INNER JOIN Orders ON Orders.CustomerID = Customers.CustomerID ORDER BY OrderDate ASC 

</pre> 

<p>10. 
<pre> 

SELECT COUNT(*) FROM Customers 

</pre> 

<p>11. 
<pre> 

SELECT COUNT(*), Country FROM Customers GROUP BY Country ORDER BY COUNT(*) ASC 
</pre> 
