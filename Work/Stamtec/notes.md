Put metadesc in main article - subpage/sublevel, etc.
Put title in Menu 

changed mechanical press article template from 5 to 3
edited /components/com_content/forms/article.xml:

		<field
			name="metadesc"
			type="textarea"
			label="JFIELD_META_DESCRIPTION_LABEL"
			rows="3"
			cols="30"
			maxlength="300" <-- from 160 to 300
			charcounter="true"
		/>