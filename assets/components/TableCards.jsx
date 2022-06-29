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
				<Card mission="orange" />
				<Card />
				<Card />
				<Card />
				<Card />
				<Card />
				<Card />
			</article>
		</section>
	);
};

export default TableCards;
