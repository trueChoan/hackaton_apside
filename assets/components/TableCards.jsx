import React from "react";

import Card from "./Card";

const TableCards = () => {
	return (
		<section id="TableCards">
			<article>
				<span>Order by</span>
				<span>search results</span>
				<span>1 | 2 | 3 | ...</span>
			</article>
			<article>
				<Card />
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
