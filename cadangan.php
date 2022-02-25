<div class="row g-3 align-items-center mb-2">
			  <div class="col-2">
			    <label for="inputPassword6" class="col-form-label">Dokter</label>
			  </div>
			  <div class="col-auto">
			    <select name="dokter" class="form-control">
                <?php foreach ($dokter as $row) :?>
                    <option value="<?=$row['id']?>"><?=$row['nama_admin']?></option>
                <?php endforeach; ?>
            </select>
			  </div>
			</div>