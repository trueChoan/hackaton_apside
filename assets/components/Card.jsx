import React from "react";

const Card = ({ bgColor, location }) => {
	return (
		<div className="Card">
			<span style={{ backgroundColor: bgColor }}></span>
			<div className="text-container">
				<div className="title">Projet :</div>
				<div>Roman graphique pour branding & storytelling</div>
			</div>
			<div className="text-container">
				<div className="title">Location :</div>
				<div>{location}</div>
			</div>
			<div className="text-container">
				<div>9 collaborators</div>
				<div>
					<span className="round"></span>
					<span className="round"></span>
					<span className="round"></span>
					<span className="round"></span>
				</div>
			</div>
		</div>
	);
};

export default Card;
