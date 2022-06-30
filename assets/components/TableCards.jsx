import React, { useState, useEffect } from "react";
import axios from "axios";

import Card from "./Card";
import OrderBy from "./OrderBy";
import SearchResult from "./SearchResult";
import ButtonPage from "./ButtonPage";

const TableCards = () => {
	const [projects, setProjects] = useState([]);

	useEffect(() => {
		axios
			.get("http://localhost:8000/api/projects")
			.then((res) => setProjects(res.data))
			.catch((err) => console.warn(err));
	}, []);

	return (
		<section id="TableCards">
			<article className="bandeau">
				<OrderBy />
				<SearchResult />
				<ButtonPage />
			</article>
			<article className="cards-container">
				{projects.map((el) => (
					<Card
						id={el.id}
						bgColor={el.domain.color}
						name={el.name}
						location={el.agency[0].name}
						collab={Math.floor(10 + Math.random() * (50 - 1))}
						resume={el.description}
						stack={el.techStack.techno}
						userFName={el.user[0].firstname}
						userLName={el.user[0].lastname}
						flag={el.user[0].flag}
						domain={el.domain.name}
						progress={el.progress}
						creationDate={el.created_at.slice(0, 10)}
					/>
				))}
			</article>
		</section>
	);
};

export default TableCards;
