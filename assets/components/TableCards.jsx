import React from "react";

import Card from "./Card";

const TableCards = () => {
	return (
		<section id="TableCards">
			<article className="bandeau">
				<span>Order by</span>
				<span>Search results : 50</span>
				<span>1 | 2 | 3 | ...</span>
			</article>
			<article className="cards-container">
				<Card bgColor="orange" location="Nantes" />
				<Card bgColor="orange" location="Paris" />
				<Card bgColor="green" location="Nantes" />
				<Card bgColor="yellow" location="Nantes" />
				<Card bgColor="blue" location="Paris" />
				<Card bgColor="blue" location="Lisbon" />
				<Card bgColor="green" location="Lisbon" />
				<Card bgColor="orange" location="Nantes" />
				<Card bgColor="orange" location="Vienne" />
				<Card bgColor="green" location="Le Tampon" />
				<Card bgColor="yellow" location="Nantes" />
				<Card bgColor="blue" location="Nantes" />
				<Card bgColor="blue" location="Berlin" />
				<Card bgColor="green" location="Nantes" />
			</article>
		</section>
	);
};

export default TableCards;
