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
				<Card bgColor="orange" location="Nantes" collab={19} />
				<Card bgColor="orange" location="Paris" collab={17} />
				<Card bgColor="green" location="Nantes" collab={15} />
				<Card bgColor="yellow" location="Nantes" collab={15} />
				<Card bgColor="blue" location="Paris" collab={10} />
				<Card bgColor="blue" location="Lisbon" collab={25} />
				<Card bgColor="green" location="Lisbon" collab={54} />
				<Card bgColor="orange" location="Nantes" collab={12} />
				<Card bgColor="orange" location="Vienne" collab={14} />
				<Card bgColor="green" location="Le Tampon" collab={19} />
				<Card bgColor="yellow" location="Nantes" collab={29} />
				<Card bgColor="blue" location="Nantes" collab={16} />
				<Card bgColor="blue" location="Berlin" collab={37} />
				<Card bgColor="green" location="Nantes" collab={39} />
			</article>
		</section>
	);
};

export default TableCards;
