import React, { useState, useEffect } from "react";
import axios from "axios";

import Card from "./Card";
import OrderBy from "./OrderBy";
import ButtonPage from "./ButtonPage";

const TableCards = () => {
	const [projects, setProjects] = useState([]);
	const [searchFilter, setSearchFilter] = useState("");

	useEffect(() => {
		axios
			.get("http://localhost:8000/api/projects")
			.then((res) => setProjects(res.data))
			.catch((err) => console.warn(err));
	}, []);

	const handleSearchFilter = (e) => {
		let value = e.target.value;
		setSearchFilter(value);
	};

	return (
		<section id="TableCards">
			<article className="bandeau">
				<OrderBy />

				<input
					type="text"
					name="searchBar"
					id="searchBar"
					placeholder="Search Project Name"
					onChange={handleSearchFilter}
				/>
				<ButtonPage />
			</article>
			<article className="cards-container">
				{projects
					.filter((el) => {
						return el.name.toLowerCase().includes(searchFilter);
					})
					.map((el) => (
						<Card
							id={el.id}
							name={el.name}
							resume={el.description}
							location={el.agency[0].name}
							userFName={el.user[0].firstname}
							userLName={el.user[0].lastname}
							collab={Math.floor(10 + Math.random() * (50 - 1))}
							stack={el.techStack.techno}
							bgColor={el.domain.color}
							domain={el.domain.name}
							// flag={el.user[0].flag}
							// progress={el.progress}
							// creationDate={el.created_at.slice(0, 10)}
						/>
					))}
			</article>
		</section>
	);
};

export default TableCards;
