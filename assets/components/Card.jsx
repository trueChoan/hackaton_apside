import React from "react";
import { makeStyles } from "@material-ui/core/styles";
import Modal from "@material-ui/core/Modal";
// function rand() {
// 	return Math.round(Math.random() * 20) - 10;
// }
// function getModalStyle() {
// 	const top = 50 + rand();
// 	const left = 50 + rand();
// 	return {
// 		top: `${top}%`,
// 		left: `${left}%`,
// 		transform: `translate(-${top}%, -${left}%)`,
// 	};
// }
// const useStyles = makeStyles((theme) => ({
// 	modal: {
// 		display: "flex",
// 		alignItems: "center",
// 		justifyContent: "center",
// 	},
// 	paper: {
// 		position: "absolute",
// 		width: 450,
// 		backgroundColor: theme.palette.background.paper,
// 		boxShadow: theme.shadows[5],
// 		padding: theme.spacing(2, 4, 3),
// 	},
// }));

function giveColor(bgColor) {
	switch (bgColor) {
		case "orange":
			return "orange";
		case "blue":
			return "blue";
		case "green":
			return "green";
		default:
			return "yellow";
	}
}

function giveStyle(bgColor) {
	switch (bgColor) {
		case "orange":
			return "repeating-linear-gradient(90deg, transparent, transparent 5px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 8px";
		case "blue":
			return "repeating-linear-gradient(120deg, transparent, transparent 5px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 8px";
		case "green":
			return "repeating-linear-gradient(200deg, transparent, transparent 8px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 16px";

		default:
			return "repeating-linear-gradient(45deg, transparent, transparent 5px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 8px";
	}
}

const Card = ({ bgColor, location, collab }) => {
	const bgColor2 = giveColor(bgColor);
	const bgStyle = giveStyle(bgColor);

	// const classes = useStyles();
	// const [modalStyle] = React.useState(getModalStyle);
	const [open, setOpen] = React.useState(false);
	const handleOpen = () => {
		setOpen(true);
	};
	const handleClose = () => {
		setOpen(false);
	};

	return (
		<div className="Card" onClick={handleOpen}>
			<span
				style={{
					backgroundColor: bgColor2,
					backgroundImage: bgStyle,
				}}
			></span>
            
			<div className="text-container">
				<div className="title">Projet :</div>
				<div>Roman graphique pour branding & storytelling</div>
			</div>
			<div className="text-container">
				<div className="title">Location :</div>
				<div>{location}</div>
			</div>
			<div className="text-container">
				<div>{collab} collaborators</div>
				<div className="round-container">
					<div className="round r1"></div>
					<div className="round r2"></div>
					<div className="round r3"></div>
					<div className="round r4"></div>
				</div>
			</div>

			<Modal
				aria-labelledby="simple-modal-title"
				aria-describedby="simple-modal-description"
				open={open}
				onClose={handleClose}
			>
				<div
					style={{
						position: "absolute",
						top: "50%",
						left: "50%",
						transform: "translate(-50%,-50%)",
						backgroundColor: "white",
					}}
				>
					<h2>{location}</h2>
					<p>
						Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
						ipsa libero tempore maiores aut. Facilis labore ducimus laboriosam
						iusto veniam harum maxime in totam dicta corporis deserunt iste
						autem adipisci libero recusandae dolorum fugit ullam, saepe
						corrupti. Obcaecati, earum corrupti repellendus molestiae impedit,
						recusandae quas officia corporis, iusto maxime voluptates!
					</p>
				</div>
			</Modal>
		</div>
	);
};

export default Card;
