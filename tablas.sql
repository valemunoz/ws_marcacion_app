CREATE TABLE app_marcador (
    id_marca integer NOT NULL,
    dni character varying(30),
    nombre character varying(300),
    fecha timestamp without time zone,
    tipo numeric,
    imagen character varying(300),
    cliente numeric,
    app character varying(300),
    apm character varying(300)
);


ALTER TABLE public.app_marcador OWNER TO "3455_moxup";

--
-- Name: app_marcador_pkey; Type: CONSTRAINT; Schema: public; Owner: 3455_moxup; Tablespace: 
--

ALTER TABLE ONLY app_marcador
    ADD CONSTRAINT app_marcador_pkey PRIMARY KEY (id_marca);

